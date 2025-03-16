<?php

namespace App\Console\Commands;

use App\Http\Controllers\IntervalsController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class intervals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'intervals:list {--left=} {--right=}';

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
        //принимаем вводные данные
        $left = $this->option('left');
        $right = $this->option('right');
        $this->line('Входные параметры: N = ' . $left . ' M = ' . $right);
        //проверяем на соответствие
        if (($left == null) || ($right == null)) {
            $this->error('Введены не корректные данные (left или right не должны быть пусты)');
            return 1;
        }
        if ($left > $right) {
            $this->error('Введены не корректные данные (left > right)');
            return 1;
        }

        //ищем пересечения
        \App\Models\Intervals::select('id', 'start', 'end')
            ->where(function($query) use ($left) {
                $query->where('start', '<=', $left)
                      ->where('end', '>=', $left);
            })
            ->orWhere(function($query) use ($left, $right) {
                $query->where('start', '>=', $left)
                      ->where('start', '<=', $right);
            })
            ->orWhere(function($query) use ($right) {
                $query->whereNull('end')
                    ->Where('start', '<=', $right);
            })
            //выводим по несколько строк, чтобы было более читаемо
            ->chunk(15, function($interval) {
                $this->table(
                    ['id', 'start', 'end'],
                    $interval
                );
                //Если количество результатов равно количеству строк вывода за итерацию,
                //то спрашиваем у пользователя, нужно ли выводить дальше
                //Если количества не совпадают, то не спрашиваем, потом что все результаты уже вывели.
                if ($interval->count() == 15) {
                    return $this->confirm('Продолжить вывод результата?', true);
                }
            });

        return 0;
    }
}
