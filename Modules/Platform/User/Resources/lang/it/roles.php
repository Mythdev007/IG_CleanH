<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Module Translation
    |--------------------------------------------------------------------------
    */

    'module' => 'Ruoli',
    'module_description' => 'Gestisci Ruoli Utente & Permessi (Permessi sono modificabili nel Dettaglio Ruolo) ',
    'module_permissions_description'=>'Gestisci Permessi per il Ruolo selezionato',

    'you_cant_remove_admin_role' => "Non puoi rimuovere il Ruolo Admin",
    'back' => 'Indietro',
    'create' => 'Crea Nuovo',
    'created' => 'Ruolo Creato',
    'updated' => 'Ruolo Aggiornato',
    'edit' => 'Modifica',
    'details' => 'Dettagli',
    'next' => 'Successivo',
    'prev' => 'Precedente',
    'delete' => 'Elimina',
    'setup_permissions'=>'Configura Permessi',
    'assign_permissions_to' => 'Assegna Permessi al Ruolo ',
    'save_permissions'=>'Salva Permessi',
    'permissions_updated'=>'Permessi Aggiornati. Controlla se tutto ok',

    'permissions' => [
      'settings'=> [
          'access'=>'Impostazioni Accesso'
      ]
    ],


    'table'=>[
        'name'=>'Nome',
        'display_name'=>'Display Name',
        'guard_name'=>'Guard Name',
        'active'=>'Active',
        'created_at'=>'Created At',
        'updated_at'=>'Updated At',
    ],


    'panel' => [
        'details' => 'Dettagli'
    ],

    'form' => [
        'name' => 'Name',
        'display_name' => 'Display Name',
        'guard_name' => 'Guard Name (most cases enter "web")',
        'save' => 'Save',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At'
    ]
];
