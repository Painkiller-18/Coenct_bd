<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE OR ALTER TRIGGER detalle_stock_trigger
        ON detalle_stock FOR INSERT
        AS
        BEGIN
            DECLARE @opcion NVARCHAR(25), @piezas INT, @id_calendario BIGINT, @stock INT
            SELECT @opcion = opcion FROM inserted
            SELECT @piezas = piezas FROM inserted
            SELECT @id_calendario = id_calendario FROM inserted
            SET @stock = (SELECT stock FROM calendario WHERE id = @id_calendario)
            IF @opcion = 'agregadas'
            BEGIN
                UPDATE calendario SET stock = (@stock+@piezas) WHERE id = @id_calendario
            END
            IF @opcion = 'removidas'
            BEGIN
                UPDATE calendario SET stock = (@stock-@piezas) WHERE id = @id_calendario
            END
        END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER detalle_stock_trigger');
    }
};
