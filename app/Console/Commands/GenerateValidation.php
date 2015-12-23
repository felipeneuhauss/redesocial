<?php
// https://mattstauffer.co/blog/advanced-input-output-with-artisan-commands-tables-and-progress-bars-in-laravel-5.1
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Class responsible to generate a validate definition an messages to be copy and past into the controller
 *
 * Class GenerateValidation
 * @package App\Console\Commands
 */
class GenerateValidation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:generate-validation {tableName?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info("Customizing validation");

        $tableName = $this->argument('tableName');

        $tableInfo = DB::select(" SHOW COLUMNS FROM ".$tableName);

        $validateReturnString =  "return Validator::make(Request::all(), [";
        $reservedColumns = array('id', 'updated_at', 'created_at', 'deleted_at');
        $validationDefinitionList = [];
        $validationMessages = "";
        $validationDefinitionString = "";

        foreach ($tableInfo as $columnInfo) {
            $validationDefinitionList = [];

            if (!in_array($columnInfo->Field, $reservedColumns)) {

//                $name = $this->ask('Qual o nome do campo em português para a mensagem?');

                // Por tipo de campo
                if ($columnInfo->Null == "NO") {
                    // 'fantasy_name.required'         => 'O campo Nome fantasia é obrigatório.',
                    $validationMessages .= "'$columnInfo->Field.required' => 'O campo ".ucfirst($columnInfo->Field). " é obrigatório', \n";
                    // 'name'                      => 'required|max:255',
                    $validationDefinitionList[] = "required";
                }

                if (strpos($columnInfo->Type, "varchar") !== false) {
                    $validationDefinitionList[] = "max:".get_numerics($columnInfo->Type)."";
                    $validationMessages .= "'$columnInfo->Field.max' => 'O campo ".ucfirst($columnInfo->Field). " deve ter no máximo ".get_numerics($columnInfo->Type)." caracteres', \n";
                }

                if (strpos($columnInfo->Type, "int") !== false) {
                    $validationDefinitionList[] = "integer";
                    $validationMessages .= "'$columnInfo->Field.integer' => 'O campo ".ucfirst($columnInfo->Field). " deve ser um número inteiro', \n";
                }

                if (strpos($columnInfo->Type, "timestamp") !== false) {
                    $validationDefinitionList[] = "date";
                    $validationMessages .= "'$columnInfo->Field.date' => 'O campo ".ucfirst($columnInfo->Field). " deve ser uma data válida', \n";
                }

                // Por nome de campo
                if (strpos($columnInfo->Field, "email") !== false) {
                    $validationDefinitionList[] = "email";
                    $validationMessages .= "'$columnInfo->Field.date' => 'O campo ".ucfirst($columnInfo->Field). " deve ser um e-mail válido', \n";
                }

                if (count($validationDefinitionList)) {
                    $validationDefinitionString .= "'$columnInfo->Field' => '".implode('|', $validationDefinitionList)."', \n";
                }
            }
        }
        $validateReturnString .= $validationDefinitionString . "],\n [ \n";

        $validateReturnString .= $validationMessages ."]);";

        dump($validateReturnString);exit;
        $this->info($validateReturnString);
    }
}
