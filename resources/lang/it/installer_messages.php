<?php 
return array (
  'title' => 'Vaance Installer',
  'next' => 'Passo successivo',
  'back' => 'Precedente',
  'finish' => 'Installare',
  'forms' => 
  array (
    'errorTitle' => 'Si sono verificati i seguenti errori:',
  ),
  'welcome' => 
  array (
    'templateTitle' => 'benvenuto',
    'title' => 'Vaance Installer',
    'message' => 'Facile installazione e installazione guidata.',
    'next' => 'Verifica i requisiti',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'Passaggio 1 | Requisiti del server',
    'title' => 'Requisiti del server',
    'next' => 'Controlla le autorizzazioni',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'Passaggio 2 | permessi',
    'title' => 'permessi',
    'next' => 'Configura ambiente',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'Passaggio 3 | Impostazioni dell\'ambiente',
      'title' => 'Impostazioni dell\'ambiente',
      'desc' => 'Seleziona come si desidera configurare il file app <code> .env </ code>.',
      'wizard-button' => 'Impostazione della Creazione guidata Maschera',
      'classic-button' => 'Editor di testo classico',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'Passaggio 3 | Impostazioni ambiente | Guidata guidata',
      'title' => 'Procedura guidata <code> .env </ code> guidata',
      'tabs' => 
      array (
        'environment' => 'Ambiente',
        'database' => 'Banca dati',
        'application' => 'Applicazione',
      ),
      'form' => 
      array (
        'name_required' => 'È richiesto un nome di ambiente.',
        'app_name_label' => 'Nome dell\'applicazione',
        'app_name_placeholder' => 'Nome dell\'applicazione',
        'app_environment_label' => 'Ambiente dell\'app',
        'app_environment_label_local' => 'Locale',
        'app_environment_label_developement' => 'Sviluppo',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => 'Produzione',
        'app_environment_label_other' => 'Altro',
        'app_environment_placeholder_other' => 'Inserisci il tuo ambiente ...',
        'app_debug_label' => 'Debug app',
        'app_debug_label_true' => 'Vero',
        'app_debug_label_false' => 'falso',
        'app_log_level_label' => 'Livello del registro app',
        'app_log_level_label_debug' => 'mettere a punto',
        'app_log_level_label_info' => 'Informazioni',
        'app_log_level_label_notice' => 'Avviso',
        'app_log_level_label_warning' => 'avvertimento',
        'app_log_level_label_error' => 'errore',
        'app_log_level_label_critical' => 'critico',
        'app_log_level_label_alert' => 'mettere in guardia',
        'app_log_level_label_emergency' => 'emergenza',
        'app_url_label' => 'Url dell\'app',
        'app_url_placeholder' => 'Url dell\'app',
        'db_connection_label' => 'Connessione al database',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'SQLSRV',
        'db_host_label' => 'Host di database',
        'db_host_placeholder' => 'Host di database',
        'db_port_label' => 'Porta del database',
        'db_port_placeholder' => 'Porta del database',
        'db_name_label' => 'Nome del database',
        'db_name_placeholder' => 'Nome del database',
        'db_username_label' => 'Nome utente del database',
        'db_username_placeholder' => 'Nome utente del database',
        'db_password_label' => 'Password del database',
        'db_password_placeholder' => 'Password del database',
        'app_tabs' => 
        array (
          'more_info' => 'Ulteriori informazioni',
          'broadcasting_title' => 'Broadcasting, Caching, Session, & amp; Coda',
          'broadcasting_label' => 'Driver di trasmissione',
          'broadcasting_placeholder' => 'Driver di trasmissione',
          'cache_label' => 'Driver di cache',
          'cache_placeholder' => 'Driver di cache',
          'session_label' => 'Driver di sessione',
          'session_placeholder' => 'Driver di sessione',
          'queue_label' => 'Driver della coda',
          'queue_placeholder' => 'Driver della coda',
          'redis_label' => 'Redis Driver',
          'redis_host' => 'Redis Host',
          'redis_password' => 'Redis Password',
          'redis_port' => 'Redis Port',
          'mail_label' => 'posta',
          'mail_driver_label' => 'Driver di posta',
          'mail_driver_placeholder' => 'Driver di posta',
          'mail_host_label' => 'Mail Host',
          'mail_host_placeholder' => 'Mail Host',
          'mail_port_label' => 'Mail Port',
          'mail_port_placeholder' => 'Mail Port',
          'mail_username_label' => 'Mail Username',
          'mail_username_placeholder' => 'Mail Username',
          'mail_password_label' => 'Mail Password',
          'mail_password_placeholder' => 'Mail Password',
          'mail_encryption_label' => 'Mail Encryption',
          'mail_encryption_placeholder' => 'Mail Encryption',
          'pusher_label' => 'Pusher',
          'pusher_app_id_label' => 'ID app Pusher',
          'pusher_app_id_palceholder' => 'ID app Pusher',
          'pusher_app_key_label' => 'Tasto App Pusher',
          'pusher_app_key_palceholder' => 'Tasto App Pusher',
          'pusher_app_secret_label' => 'Pusher App Secret',
          'pusher_app_secret_palceholder' => 'Pusher App Secret',
        ),
        'buttons' => 
        array (
          'setup_database' => 'Setup Database',
          'setup_application' => 'Applicazione di installazione',
          'install' => 'Installare',
        ),
      ),
    ),
    'classic' => 
    array (
      'templateTitle' => 'Passaggio 3 | Impostazioni ambiente | editore',
      'title' => 'Editor Ambiente',
      'save' => 'Salva .env',
      'back' => 'Usa la creazione guidata della forma',
      'install' => 'Installare',
    ),
    'success' => 'Le tue impostazioni del file .env sono state salvate.',
    'errors' => 'Impossibile salvare il file .env, per favore crealo manualmente.',
  ),
  'install' => 'Installare',
  'installed' => 
  array (
    'success_log_message' => 'Vaance Installer installato con successo su',
  ),
  'final' => 
  array (
    'title' => 'Installazione terminata',
    'templateTitle' => 'Installazione terminata',
    'finished' => 'L\'applicazione è stata installata con successo.',
    'migration' => 'Migrazione & amp; Uscita console di semi:',
    'console' => 'Uscita console applicativa:',
    'log' => 'Registrazione del registro di installazione:',
    'env' => 'File .env finale:',
    'exit' => 'Clicca qui per uscire',
  ),
  'updater' => 
  array (
    'title' => 'Laravel Updater',
    'welcome' => 
    array (
      'title' => 'Benvenuto nell\'aggiornatore',
      'message' => 'Benvenuto nella procedura guidata di aggiornamento.',
    ),
    'overview' => 
    array (
      'title' => 'Panoramica',
      'message' => 'C\'è 1 aggiornamento. | Ci sono aggiornamenti :number.',
      'install_updates' => 'Installare aggiornamenti',
    ),
    'final' => 
    array (
      'title' => 'Finito',
      'finished' => 'Il database dell\'applicazione è stato aggiornato con successo.',
      'exit' => 'Clicca qui per uscire',
    ),
    'log' => 
    array (
      'success_message' => 'Vaance Installer è stato aggiornato con successo su',
    ),
  ),
);