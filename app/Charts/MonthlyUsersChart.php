<?php

namespace App\Charts;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Note;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 
   
    public function build()
    {
        // $users = User::all('name','created_at')->toArray();
        // $arr_created_at = Arr::pluck($users, 'created_at');
        
        //  $get_month = $this->getMonth($arr_created_at);
        
        //     $users = User::all('name','created_at')->toArray();
        //     $arr_created_at = Arr::pluck($users, 'created_at');
        //     for ($i = 0; $i <= count($arr_created_at); $i++ ){
                
        //          $getMonth = Carbon::parse( $arr_created_at[$i])->month;

        //     }
            // $arr_user = Arr::pluck($users, 'name');
            $notes = Note::all('name','created_at')->toArray();
            // $arr_notes = Arr::pluck($notes, 'name');
            $arr_created_at = Arr::pluck($notes, 'created_at');
            for ($i = 0; $i < count($arr_created_at); $i++ ){
                    
                $getMonth_notes = Carbon::parse( $arr_created_at[$i])->month;
                if($getMonth_notes == 6){
                    dd( array_count_values($arr_created_at));
                   
                }
            }
            
           
        return $this->chart->pieChart()
            ->setTitle('Top 3 scorers of the team.')
            ->setSubtitle('Season 2021.')
            ->addData([ 5, 10])
            ->setLabels(['User', 'Note']);
    }

    

}


