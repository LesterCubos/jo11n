<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BackupLog;

class BackupController extends Controller
{
    public function our_backup_database()
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $bup = BackupLog::all();
        if ($bup->isEmpty()) {
            $fname = 'BackUp1';
        } else {
            $bupl = BackupLog::latest()->first(); 
            $num = $bupl->id + 1;
            $fname = 'BackUp'+$num;
        }

        $back = new BackupLog();
        $back->date =  $currentDate;
        $back->file_name = $fname;
        $back->save();

        $mysqlHostName = env('DB_HOST', '127.0.0.1');
        $mysqlUserName = env('DB_USERNAME', 'root');
        $mysqlPassword = env('DB_PASSWORD', '');
        $DbName = env('DB_DATABASE', 'jo11nstore');
        $backup_name = "mybackup.sql";
        $tables = array("backup_logs","categories","failed_jobs","migrations","orders","password_reset_tokens","personal_access_tokens","products","receive_issues","receive_issue_logs","recent_activities","remmove_stocks","requests","stocks","suppliers","transactions","users","reports"); //here your tables...

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword",array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();


        $output = '';
        foreach($tables as $table)
        {
         $show_table_query = "SHOW CREATE TABLE " . $table . "";
         $statement = $connect->prepare($show_table_query);
         $statement->execute();
         $show_table_result = $statement->fetchAll();

         foreach($show_table_result as $show_table_row)
         {
          $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
         }
         $select_query = "SELECT * FROM " . $table . "";
         $statement = $connect->prepare($select_query);
         $statement->execute();
         $total_row = $statement->rowCount();

         for($count=0; $count<$total_row; $count++)
         {
          $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
          $table_column_array = array_keys($single_result);
          $table_value_array = array_values($single_result);
          $output .= "\nINSERT INTO $table (";
          $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
          $output .= "'" . implode("','", $table_value_array) . "');\n";
         }
        }
        $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
           header('Pragma: public');
           header('Content-Length: ' . filesize($file_name));
           ob_clean();
           flush();
           readfile($file_name);
           unlink($file_name);

    }
}
