<?php

namespace App\Console\Commands;

use App\Repositories\VehicleRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AppReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset {--factory}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the application database';

    private $vehicleRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        parent::__construct();

        $this->vehicleRepository = $vehicleRepository;

    }


    private function appReset(): bool
    {
        Artisan::call('migrate:fresh --seed');
        $this->info("Veritabanı sıfırlanıp varsayılan değerler tabloya eklendi.");

        Artisan::call('passport:install');
        $this->info("API uygulama anahtarı oluşturuldu.");


        if ($this->option('factory')) {
            $this->vehicleRepository->factory()->count(100)->create();
            $this->info("Araçlar kayıtlara eklendi.");
        }

        return true;
    }

    /**
     * Execute the console command.
     *
     * @return bool
     */
    public function handle(): bool
    {

        $warning_message = '>>>> Canlı mod açık durumda yine de uygulamayı sıfırlamak istediğinizden emin misiniz ? <<<<';

        if (env('APP_ENV') !== 'production') return $this->appReset();

        if ($this->confirm($warning_message, true)) return $this->appReset();

        $this->info('İşlem iptal edildi');

        return true;
    }

}
