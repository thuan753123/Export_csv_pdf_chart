<?php

namespace App\Charts;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Note;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class BarChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        
        $notes = Note::all('name','created_at')->toArray();
        $arr_n = [];
        $arr_notes_created_at = Arr::pluck($notes, 'created_at');
        for ($i = 0; $i < count($arr_notes_created_at); $i++ ){     
            $getMonth_notes = Carbon::parse( $arr_notes_created_at[$i])->month;
            array_push($arr_n,$getMonth_notes);            
        }
        $arr_notes = array_count_values($arr_n);
        // $arr0 = $arr;
        // $dem = 0;
        // for ($i = 0 ; $i < count ($arr); $i++){
        //     for($j = 0; $j < count ($arr0) ; $j++){
        //         if($arr[$i] == $arr0[$j])
        //          {
        //            $dem++;
        //          }
        //     }
        //     if ($dem >1) { // In ra nếu xuất hiện nhiều hơn 1 lần
        //         echo $arr[$i]  ,':', $dem , ' lần </br>';
        //         $dem = 0;
        //     }
        // }
        
        $users = User::all('name', 'created_at')->toArray();
        $arr_users_created_at = Arr::pluck($users, 'created_at');
        $arr_u = [];
        for ($i = 0; $i < count( $arr_users_created_at); $i++ ){     
            $getMonth_users = Carbon::parse(  $arr_users_created_at[$i])->month;
            array_push($arr_u,$getMonth_users);            
        }
        
        $arr_users = array_count_values($arr_u);
        return $this->chart->barChart()

            ->setTitle('Users vs Notes.')
            ->setSubtitle('Compare during each month in season 2022.')
            ->addData('Notes',[ $arr_notes[1],$arr_notes[2],$arr_notes[3],$arr_notes[4],$arr_notes[5],$arr_notes[6],$arr_notes[7],$arr_notes[8],$arr_notes[9],$arr_notes[10], $arr_notes[11],$arr_notes[12]] )
            ->addData('User', [$arr_users[1],$arr_users[2],$arr_users[3],$arr_users[4],$arr_users[5],$arr_users[6],$arr_users[7],$arr_users[8],$arr_users[9],$arr_users[10], $arr_users[11],$arr_users[12]])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
    }

    
}
