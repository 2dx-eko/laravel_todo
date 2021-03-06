<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\todo;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;



class CreateTodoCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:todocsv {serch_text}{status}{query?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $serch_text = $this->argument('serch_text');
        $status = $this->argument('status');
        $query = Todo::query();
        
        if($serch_text) {
            $query->where('title', 'like', '%'.$serch_text.'%');
        }
        if($status){
            $query->where('status',$status);
        }
        $search_infos= $query->get();

        //ロックファイル生成(作成状況の確認)
        $day = date('Y-m-d');
        $filename = $day . "lock.txt";
        $total = count(Todo::all());
        $count = count($search_infos);
        $updated_at = date('Y-m-d H:i:s'); 
       $lines = $status.",".$filename.",".$count.",".$total.",".$updated_at ."\n";

        $fp = fopen("/var/tmp/lock.txt", "w");
        fwrite($fp, $lines);
       
        fclose($fp);


        //csv生成
        $stream = fopen('/var/tmp/demo.csv', 'a');
        foreach ($search_infos as $search_info) {
            //csv書き込み
            $array = $search_info->toArray();
            $line = implode('_',$array);
            fwrite($stream,$line . "\n");

            //ロックファイル更新
            $fp = fopen("/var/tmp/lock.txt", "a");
            fwrite($fp,$line . "\n");

        }
        fclose($stream);
    }
}
    /*
        header('Content-Type: application/octet-stream');
        header('Content-Length: '.filesize($filepath));
        header('Content-Disposition: attachment; filename=member.csv');

        readfile($filepath);
    // ファイル生成
    $stream = fopen('http://localhost:8001/api/v1/todo/export/', 'w');
    fwrite($stream, pack('C*',0xEF,0xBB,0xBF)); // BOM をつける

    // ヘッダー
    fputcsv($stream, ['header1', 'header2']);

    // 
    foreach ($search_info as $search_infos) {
        fputcsv($stream, $search_infos);
    }
    fclose($stream);
    return response(stream_get_contents($stream), 200)
                 ->header('Content-Type', 'text/csv')
                 ->header('Content-Disposition', 'attachment; filename="demo.csv"');

        return response()->json(['stream' => $stream,]);   */