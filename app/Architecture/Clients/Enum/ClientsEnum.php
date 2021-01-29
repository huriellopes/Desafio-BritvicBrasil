<?php

namespace App\Architecture\Clients\Enum;

class ClientsEnum
{
    //Messages
    const NOT_FOUND = 'Cliente não encontrado.';
    const CREATED = 'O cliente foi criado com sucesso.';
    const UPDATED = 'O cliente foi atualizado com sucesso.';
    const DESACTIVE = 'O cliente foi desativado com sucesso';
    const ACTIVE = 'O cliente foi ativado com sucesso';
    const DELETE = 'O cliente foi excluído com sucesso';
    const NOT_CREATED = 'Erro ao cadastrar o cliente.';
    const NOT_UPDATED = 'Erro ao editar o cliente.';
    const NOT_ACTIVED = 'Erro ao ativar o cliente.';
    const NOT_DESACTIVED = 'Erro ao desativar o cliente.';
    const NOT_DELETED = 'Erro ao deletar o cliente.';
}
