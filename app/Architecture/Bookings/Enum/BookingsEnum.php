<?php

namespace App\Architecture\Bookings\Enum;

class BookingsEnum
{
    //Messages
    const NOT_FOUND = 'Reserva não encontrada.';
    const CREATED = 'A reserva foi criada com sucesso.';
    const UPDATED = 'A reserva foi atualizada com sucesso.';
    const DESACTIVE = 'A reserva foi desativada com sucesso';
    const ACTIVE = 'A reserva foi ativada com sucesso';
    const DELETE = 'A reserva foi excluída com sucesso';
    const NOT_CREATED = 'Erro ao cadastrar a reserva';
    const NOT_UPDATED = 'Erro ao editar a reserva.';
    const NOT_ACTIVED = 'Erro ao ativar a reserva.';
    const NOT_DESACTIVED = 'Erro ao desativar a reserva.';
    const NOT_DELETED = 'Erro ao deletar a reserva.';
}
