<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\activity_type;
use App\Models\form_zoom_respons;
use App\Models\regions;
use App\Models\zoom_respons;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Throwable;
use Carbon\Carbon;

class ScheduleController extends Controller
{

    const ACCESS_TOKEN = "eyJzdiI6IjAwMDAwMSIsImFsZyI6IkhTNTEyIiwidiI6IjIuMCIsImtpZCI6IjdlMDgwN2RmLWNmNGUtNDZlYi04YmY1LWFlYWE2ODQwM2I2ZCJ9.eyJhdWQiOiJodHRwczovL29hdXRoLnpvb20udXMiLCJ1aWQiOiJQQkVRRHM3Y1RUS3BVa3dIbnZUVVRnIiwidmVyIjo5LCJhdWlkIjoiOTFmNjI4YTE2MGI1NTAyOGE4Zjg2MmVlNDhjZTQ4ZDYiLCJuYmYiOjE3MTA1NDEzNTYsImNvZGUiOiJBVUEyeHpnSFFjNlVXU2htb2xYdUVBNnJ5eGZoMlVIV24iLCJpc3MiOiJ6bTpjaWQ6VjkwbzRfMURTMUdReFYyS0hoVXVHUSIsImdubyI6MCwiZXhwIjoxNzEwNTQ0OTU2LCJ0eXBlIjozLCJpYXQiOjE3MTA1NDEzNTYsImFpZCI6ImlfajFzY3VQUW02SVpLT3Q2cEJjMEEifQ.WgnxBGGjcxaTNeIzgau6XPunuXjimUu-ur1bmr1LTB-pjszzWnpZ2Ti0mpLR8gsiBzPiMNZe9IyZ19xbNHBK-w";

    // https://developers.zoom.us/docs/api/
    public function find_schedule(Request $request)
    {

        // init
        $email = $request["email"];
        $date = $request["date"];
        $start_time = $request["start_time"];
        $end_time = $request["end_time"];

        // get data to zoom
        [$status_code, $data, $err] = $this->get_meeting_list();
        if ($status_code != 200) {
            dd($err);
        }

        // input time
        $input_start_time = Carbon::createFromFormat('Y-m-d\TH:i', $date . "T" . $start_time, 'Asia/Jakarta');
        $input_end_time = Carbon::createFromFormat('Y-m-d\TH:i', $date . "T" . $end_time, 'Asia/Jakarta');
        $input_duration = $input_start_time->diffInMinutes($input_end_time);
        $input_start_time_utc_format = $input_start_time->utc()->format('Y-m-d\TH:i:s\Z');

        // looping meetings
        $is_available = true;
        foreach ($data->meetings as $meeting) {

            // meeting time
            $meeting_start_time = Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $meeting->start_time, 'UTC');
            $meeting_end_time = $meeting_start_time->copy()->addMinutes($meeting->duration);


            // Check if the date to compare falls within the range with duration
            if ($input_duration < $meeting->duration) {
                $meeting_start_time_cp = $meeting_start_time->copy()->addMinutes(1);
                $meeting_end_time_cp = $meeting_end_time->copy()->addMinutes(-1);
                if ($input_start_time->between($meeting_start_time_cp, $meeting_end_time_cp) || $input_end_time->between($meeting_start_time_cp, $meeting_end_time_cp)) {
                    $is_available = false;
                    break;
                }
            } else if ($input_duration > $meeting->duration) {
                $input_start_time_cp = $input_start_time->copy()->addMinutes(1);
                $input_end_time_cp = $input_end_time->copy()->addMinutes(-1);
                if ($meeting_start_time->between($input_start_time_cp, $input_end_time_cp) || $meeting_end_time->between($input_start_time_cp, $input_end_time_cp)) {
                    $is_available = false;
                    break;
                }
            } else {
                $input_start_time_cp = $input_start_time->copy()->addMinutes(1);
                $input_end_time_cp = $input_end_time->copy()->addMinutes(-1);
                if ($input_start_time_cp->between($meeting_start_time, $meeting_end_time) || $input_end_time_cp->between($meeting_start_time, $meeting_end_time)) {
                    $is_available = false;
                    break;
                }
            }
        }


        // create meeting
        // if ($is_available) {
        // $input_start_time_utc_format = $input_start_time->utc()->format('Y-m-d\TH:i:s\Z');
        //     [$status_code, $data, $msg] = $this->create_meeting("Meetingku bersamamu", $input_duration, $input_start_time_utc_format);
        //     dd($data);
        // }

        dd($is_available);
    }

    public function get_meeting_list()
    {
        try {

            // client
            $client = new Client();
            $headers = [
                'Authorization' => 'Bearer ' . self::ACCESS_TOKEN
            ];
            $response = $client->request('GET', 'https://api.zoom.us/v2/users/me/meetings?type=upcoming', [
                'headers' => $headers
            ]);

            // body
            $body = $response->getBody()->getContents();

            // status code
            $status_code = $response->getStatusCode();
            if ($status_code == 200) {

                // decode
                $dataArray = json_decode($body);
                if ($dataArray === null && json_last_error() !== JSON_ERROR_NONE) {
                    return [$status_code, [], 'Error decoding JSON: ' . json_last_error_msg()];
                }
            } else {
                return [$status_code, [], $status_code . $body];
            }
        } catch (Throwable $e) {
            return [Response::HTTP_INTERNAL_SERVER_ERROR, [], "Error: " . $e->getMessage()];
        }

        return [$status_code, $dataArray, ""];
    }

    public function create_meeting($agenda, $duration, $start_time)
    {
        try {

            // client
            $client = new Client();
            $headers = [
                'Authorization' => 'Bearer ' . self::ACCESS_TOKEN,
                'Content-Type' => 'application/json',
            ];
            // body
            $reqBody = [
                "agenda" => $agenda,
                "default_password" => false,
                "duration" => $duration,
                "password" => "123456",
                "pre_schedule" => false,
                "schedule_for" => "zoom14@ingenioindonesia.id",
                "start_time" => $start_time,
                "topic" => $agenda,
                "type" => 2,
                "settings" => [
                    "join_before_host" => true,
                    "jbh_time" => 0
                ]
            ];
            $response = $client->post('https://api.zoom.us/v2/users/me/meetings', [
                'headers' => $headers,
                'json' => $reqBody,
            ]);

            // body
            $body = $response->getBody()->getContents();

            // status code
            $dataArray = [];
            $status_code = $response->getStatusCode();
            if ($status_code == 201) {
                // decode
                $dataArray = json_decode($body);
                if ($dataArray === null && json_last_error() !== JSON_ERROR_NONE) {
                    return [$status_code, [], 'Error decoding JSON: ' . json_last_error_msg()];
                }
            } else {
                return [$status_code, [], $status_code . $body];
            }
        } catch (Throwable $e) {
            return [Response::HTTP_INTERNAL_SERVER_ERROR, [], "Error: " . $e->getMessage()];
        }

        return [$status_code, $dataArray, ""];
    }


    // https://github.com/PHPOffice/PhpSpreadsheet/blob/master/samples/Basic/01_Simple_download_xlsx.php
    public function write_excel()
    {

        // create new spreadsheet
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Maarten Balliauw')
            ->setLastModifiedBy('Maarten Balliauw')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');

        // Miscellaneous glyphs, UTF-8
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Simple');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="01simple.xlsx"');
        header('Cache-Control: max-age=0');

        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        // save
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');

        // clearing memory
        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);
    }

    public function index()
    {
        return view ('scheduleClass.index');
    }

    public function formSchedule ()
    {
        $activity = activity_type::get();
        $region = regions::get();
        //dd($activity);
        return view ('scheduleClass.form_schedule', compact('activity','region'));
    }

    public function saveSchedule (Request $request)
    {
        zoom_respons::create([
            'user_id' => $request->inputUser,
            'region_id' => $request->inputRegion,
            'is_online' => $request->inputIsOnline,
            'activity_type_id' => $request->inputActivityType,
            'class_name' => $request->inputClass,
            'start_date' => $request->inputStartDate,
            'start_time' => $request->inputStartTime,
            'end_time' => $request->inputEndTime,
            'whatsapp' => $request->inputWA,
            'zoom_account_id' => $request->inputZoomID,
            'login_url' => $request->inputLogin,
            'claim_host' => $request->inputHost,
            'zoom_account_id' => $request->inputIdZoom,
            'login_url' => $request->inputLogin,
            'claim_host' => $request->inputHost,
        ]);

        return redirect ('/form_schedule');
    }
}
