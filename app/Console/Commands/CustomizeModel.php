<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpSpec\Exception\Exception;


/**
 * Class responsible to generate a model or a set of models based in database tables
 * and configure your structure with interfaces and inheritance
 *
 * Class CustomizeModel
 * @package App\Console\Commands
 */
class CustomizeModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:customize-model {tableName?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Field names list.';

    private $tableColumns = array();

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
        $this->info("Customizing model");

        $tables = DB::select("SHOW TABLES");

        $tableName = $this->argument('tableName');

        try {

            if ($tableName) {
                $this->generateBelongToModelFunctions($tableName);
                return $this->info("Model $tableName customized");
            }

            $paramName = "Tables_in_".env('DB_DATABASE');
            foreach ($tables as $table) {
                if ($table != 'users') {
                    $this->generateBelongToModelFunctions($table->$paramName);
                }
            }
            $this->comment("belongsTo function add to models.");

            foreach ($tables as $table) {
                $this->generateHasManyModelFunctions($table->$paramName);
            }
            $this->comment("hasMany function add to models.");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
        return $this->info('Models customized. End.');

    }

    public function generateBelongToModelFunctions($tableName) {
        $columns = DB::select("SELECT CONCAT(\"'\", GROUP_CONCAT(column_name ORDER BY ordinal_position SEPARATOR \"', '\"), \"'\") AS columns
                FROM information_schema.columns
                WHERE table_schema = '".env('DB_DATABASE', 'forge')."' AND table_name = '$tableName'");

        $columnsName = $columns[0]->columns;
        $columns     = explode(',', $columns[0]->columns);

        // Get model file
        $modelName   = $this->prepareModelName($tableName);

        $fileName = __DIR__ . '/../../Models/'.$modelName. '.php';

        $fileContent = <<<EOL
<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class $modelName extends Model implements ModelInterface
{
    use SoftDeletes;

    protected \$table = '$tableName';

    protected \$dates = ['deleted_at'];

    protected \$fillable = [$columnsName];


EOL;
        // BelongTo relationship
        foreach ($columns as &$column) {
            $column = str_replace("'", "", $column);

            $this->tableColumns[$tableName][] = $column;
            if (strpos($column, '_id')) {
                $modelRelationName = $this->prepareModelName(rtrim($column, '_id'));
                $this->info($modelName. ' belongsTo '. $modelRelationName);

                // Configura  o nome da funcao e nome da model
                $belongToFunctionName = lcfirst($modelRelationName);
                $modelRelationName = "App\\Models\\" . $modelRelationName;

                $fileContent .= <<<EOL

    public function $belongToFunctionName() {
        return \$this->belongsTo('$modelRelationName');
    }

EOL;
            }
        }

        $fileContent .= <<<EOL

    public function queryPagination(\$perPage = 15, \$search)
    {
        \$result = \$this->where('name', 'like', '%'.\$search.'%')
            ->paginate(\$perPage);

        return \$result;
    }
}
EOL;

        file_put_contents($fileName, $fileContent);
        $this->info('Created class in '.$fileName);

    }

    public function generateHasManyModelFunctions($tableName)
    {

        // Get model file
        $modelName   = $this->prepareModelName($tableName);

        foreach ($this->tableColumns[$tableName] as $column) {

            if (strpos($column, '_id')) {
                $modelRelationName = $this->prepareModelName(rtrim($column, '_id'));
                $modelRelationClassName = "App\\Models\\" . $modelName;

                $hasManyFunctionName = str_plural(lcfirst($modelName));
                $this->info($modelRelationName. ' hasMany '. $modelName);

                /**
                 * Obtem o arquivo referente a coluna para add o hasMany() na classe pai
                 */
                $relationalFileName = __DIR__ . '/../../Models/' . $modelRelationName . '.php';
                $relationalFileContent = file_get_contents($relationalFileName);

                $relationalFileContent = str_lreplace('}', '', $relationalFileContent);

                $relationalFileContent .= <<<EOL

    public function $hasManyFunctionName()
    {
        return \$this->hasMany('$modelRelationClassName');
    }
}

EOL;
                // Salva o mapeamento da relacao de forma inversa
                file_put_contents($relationalFileName, $relationalFileContent);
            }
        }

    }


    /**
     * Prepare a model name based in table name
     *
     * @param $tableName
     * @return string
     */
    public function prepareModelName($tableName)
    {
        $modelName = ucfirst(str_singular(trim($tableName)));

        if (strpos($tableName, '_') !== 0) {
            $modelNameExplodeList = explode('_', $tableName);

            $newModelName = '';
            foreach($modelNameExplodeList as $kName => $name) {
                $newModelName .= ucfirst(str_singular(trim($name)));
            }

            $modelName = $newModelName;
        }

        return ucfirst($modelName);
    }
}
