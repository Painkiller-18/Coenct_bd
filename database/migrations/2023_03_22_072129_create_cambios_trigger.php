<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
        CREATE OR ALTER TRIGGER cambios_trigger
        ON cambios FOR UPDATE
        AS
        BEGIN
            SET DATEFIRST 1
            DECLARE @vidaUtil INT, @idCalendario BIGINT, @statusCambio NVARCHAR(15),
            @diaSemana INT, @nuevaFecha DATE, @idUsuario BIGINT, @idAyudaVisual BIGINT
            SELECT @idCalendario = id_calendario FROM inserted
            SELECT @statusCambio = status FROM inserted
            SET @vidaUtil = (SELECT vida_util FROM calendario WHERE id = @idCalendario)
            IF @statusCambio = 'Completado'
            BEGIN
                SELECT @idUsuario = id_usuario FROM inserted
                SET @idAyudaVisual = (SELECT id_ayuda_visual FROM calendario WHERE id = @idCalendario)
                INSERT INTO registrolectura(id_users, id_ayudavisual) VALUES(@idUsuario, @idAyudaVisual)
                IF @vidaUtil = -1
                BEGIN
                    SET @nuevaFecha = (SELECT DATEADD(WEEK, 1, SYSDATETIME()))
                    SET @diaSemana = (SELECT DATEPART(DW, @nuevaFecha))
                    IF @diaSemana = 3
                    BEGIN
                        INSERT INTO cambios(id_calendario, id_usuario, status, fecha, comentarios, actualizado)
                        VALUES(@idCalendario, NULL, 'Pendiente', @nuevaFecha, NULL, NULL)
                    END
                    ELSE
                    BEGIN
                        SET @nuevaFecha = (SELECT CASE @diaSemana
                            WHEN 1
                            THEN DATEADD(DAY, 2, @nuevaFecha)
                            WHEN 2
                            THEN DATEADD(DAY, 1, @nuevaFecha)
                            WHEN 4
                            THEN DATEADD(DAY, 6, @nuevaFecha)
                            WHEN 5
                            THEN DATEADD(DAY, 5, @nuevaFecha)
                            WHEN 6
                            THEN DATEADD(DAY, 4, @nuevaFecha)
                            WHEN 7
                            THEN DATEADD(DAY, 3, @nuevaFecha)
                            END)
                        INSERT INTO cambios(id_calendario, id_usuario, status, fecha, comentarios, actualizado)
                        VALUES(@idCalendario, NULL, 'Pendiente', @nuevaFecha, NULL, NULL)
                    END
                END
                ELSE
                BEGIN
                    SET @nuevaFecha = (SELECT DATEADD(MONTH, @vidaUtil, SYSDATETIME()))
                    SET @diaSemana = (SELECT DATEPART(DW, @nuevaFecha))
                    IF @diaSemana = 3
                    BEGIN
                        INSERT INTO cambios(id_calendario, id_usuario, status, fecha, comentarios, actualizado)
                        VALUES(@idCalendario, NULL, 'Pendiente', @nuevaFecha, NULL, NULL)
                    END
                    ELSE
                    BEGIN
                        SET @nuevaFecha = (SELECT CASE @diaSemana
                            WHEN 1
                            THEN DATEADD(DAY, 2, @nuevaFecha)
                            WHEN 2
                            THEN DATEADD(DAY, 1, @nuevaFecha)
                            WHEN 4
                            THEN DATEADD(DAY, 6, @nuevaFecha)
                            WHEN 5
                            THEN DATEADD(DAY, 5, @nuevaFecha)
                            WHEN 6
                            THEN DATEADD(DAY, 4, @nuevaFecha)
                            WHEN 7
                            THEN DATEADD(DAY, 3, @nuevaFecha)
                            END)
                        INSERT INTO cambios(id_calendario, id_usuario, status, fecha, comentarios, actualizado)
                        VALUES(@idCalendario, NULL, 'Pendiente', @nuevaFecha, NULL, NULL)
                    END
                END
            END
            ELSE
            BEGIN
                IF @statusCambio = 'Pospuesto'
                BEGIN
                    SET @nuevaFecha = (SELECT DATEADD(WEEK, 1, SYSDATETIME()))
                    SET @diaSemana = (SELECT DATEPART(DW, @nuevaFecha))
                    IF @diaSemana = 3
                    BEGIN
                        INSERT INTO cambios(id_calendario, id_usuario, status, fecha, comentarios, actualizado)
                        VALUES(@idCalendario, NULL, 'Pendiente', @nuevaFecha, NULL, NULL)
                    END
                    ELSE
                    BEGIN
                        SET @nuevaFecha = (SELECT CASE @diaSemana
                            WHEN 1
                            THEN DATEADD(DAY, 2, @nuevaFecha)
                            WHEN 2
                            THEN DATEADD(DAY, 1, @nuevaFecha)
                            WHEN 4
                            THEN DATEADD(DAY, 6, @nuevaFecha)
                            WHEN 5
                            THEN DATEADD(DAY, 5, @nuevaFecha)
                            WHEN 6
                            THEN DATEADD(DAY, 4, @nuevaFecha)
                            WHEN 7
                            THEN DATEADD(DAY, 3, @nuevaFecha)
                            END)
                        INSERT INTO cambios(id_calendario, id_usuario, status, fecha, comentarios, actualizado)
                        VALUES(@idCalendario, NULL, 'Pendiente', @nuevaFecha, NULL, NULL)
                    END
                END
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
        DB::unprepared('DROP TRIGGER cambios_trigger');
    }
};
