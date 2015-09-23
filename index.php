<?php
// Define root dir and root path
define( 'PG_DS', DIRECTORY_SEPARATOR );
define( 'PG_ROOT_DIR', dirname( __FILE__ ) . PG_DS );
define( 'PG_ROOT_PATH', basename( dirname( __FILE__ ) ) . PG_DS );
define( 'PG_ROOT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/cframe/' );


// Define the request home that will always persist in REQUEST_URI
$request_home = PG_DS . PG_ROOT_PATH;

// Read the request
$request = $_SERVER['REQUEST_URI'];
$components = array();
$controller = 'Master';
$method = 'index';
$admin_routing = false;
$param = array();

$master_controller = new \Controllers\Master_Controller();

if ( ! empty( $request ) ) {
    if( 0 === strpos( $request, $request_home ) ) {
        // Clean the request
        $request = substr( $request, strlen( $request_home ) );


        // Switch to admin routing
        if( 0 === strpos( $request, 'admin' ) ) {
            $admin_routing = true;
            include_once 'controllers/admin/admin_controller.php';
            $request = substr( $request, strlen( 'admin/' ) );
        }


        // Fetch the controller, method and params if any
        $components = explode( PG_DS, $request, 3 );
        // Get controller and such
        if ( 1 < count( $components ) ) {
            list( $controller, $method ) = $components;

            $param = isset( $components[2] ) ? $components[2] : array();
        }
    }
}
// If the controller is found
if ( isset( $controller ) && file_exists( 'controllers/' . $controller . '.php' ) ) {
    $admin_folder = $admin_routing ? 'admin/' : '';
    include_once 'controllers/' . $admin_folder . $controller . '.php';

    // Is admin controller?
    $admin_namespace = $admin_routing ? '\Admin' : '';

    // Form the controller class
    $controller_class = $admin_namespace . '\Controllers\\' . ucfirst( $controller ) . '_Controller';
    $instance = new $controller_class();

    // Call the object and the method
    if( method_exists( $instance, $method ) ) {
        call_user_func_array( array( $instance, $method ), array( $param ) );

// 		$instance->$method();
    } else {
        // fallback to index
        call_user_func_array( array( $instance, 'index' ), array() );
    }
} else {
    $master_controller->home();
}