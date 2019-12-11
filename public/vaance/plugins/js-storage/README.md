JS Storage
==========

JS Storage is a plugin that simplifies access to storages (HTML5), cookies, and namespace storage functionality and provides compatiblity for old browsers with cookies!

Functionalities:
* To store object easily, encode/decode it with JSON automatically
* Ability to define namespace and use it as a specific storage
* Magic getter and setter to have access at an infinite object level with one call
* Add js-cookie (https://github.com/js-cookie/js-cookie) and manage your cookies with this API


Storages
--------
#### Local storage
    Storages.localStorage

#### Session storage
    Storages.sessionStorage

#### Cookie storage (only if js-cookie added)
    Storages.cookieStorage

#### Namespace storage
    ns=Storages.initNamespaceStorage('ns_name');
    ns.localStorage // Namespace in localStorage
    ns.sessionStorage // Namespace in sessionStorage
    ns.cookieStorage // Namespace in cookieStorage (only if js-cookie added)

Public methods on storage
-------------------------

Public methods are usable on all storage objects (Storages.localStorage, Storages.sessionStorage, Storages.cookieStorage or object returned by Storages.initNamespaceStorage)

    storage=Storages.localStorage

### `get()`
Get an item from a storage.  
If last argument is an array (can be preceded by other arguments to parse storage), get() returns an object with value for each item of this array.

    storage.get('foo') // Return storage.foo
    storage.get('foo.foo2.foo3...') // Return storage.foo.foo2.foo3...
    storage.get('foo','foo2','foo3'...) // Return storage.foo.foo2.foo3...
    storage.get(['foo','foo2']) // Return {foo:storage.foo,foo2:storage.foo2}

### `set()`
Set an item in a storage.  
If argument is an object, set() sets value on storage for each property of this object.

    storage.set('foo','value') // Set storage.foo to "value"
    storage.set('foo.foo2.foo3...','value') // Set storage.foo.foo2.foo3... to "value"
    storage.set('foo','foo2','foo3'...,'value') // Set storage.foo.foo2.foo3... to "value"
    storage.set({'foo':'value','foo2':'value2'}) // Set storage.foo to "value" and storage.foo2 to "value2"

### `keys()`
Get keys of a storage or an item in a storage.

    storage.set('foo','value')
    storage.set('foo2','foo3'..., {'foo4':'value4','foo5':'value5'})
    storage.keys() // Return keys of storage (["foo", "foo2"])
    storage.keys('foo2') // Return keys of storage.foo2 (["foo3"])
    storage.keys('foo2.foo3...') // Return keys of storage.foo2.foo3... (["foo4", "foo5"])
    storage.keys('foo2','foo3'...) // Return keys of storage.foo2.foo3... (["foo4", "foo5"])

### `isEmpty()`
Check if a storage or an item in a storage is empty (if equal to "", 0, null, undefined, [] or {}).  
If last argument is an array (can be preceded by other arguments to parse storage), isEmpty() tests storage for each item of this array, and returns true only if all tests return true.

    storage.set('foo','value')
    storage.set('foo2','foo3'..., {'foo4':'value4','foo5':'value5'})
    storage.set('foo6','')
    storage.set('foo7',{})
    storage.isEmpty('foo') // Check if storage.foo is empty (false)
    storage.isEmpty('foo6') // Check if storage.foo6 is empty (true)
    storage.isEmpty('foo7') // Check if storage.foo7 is empty (true)
    storage.isEmpty('foo2.foo3...') // Check if storage.foo2.foo3... is empty (false)
    storage.isEmpty('foo2','foo3'...) // Check if storage.foo2.foo3... is empty (false)
    storage.isEmpty(['foo','foo2']) // Check if storage.foo and storage.foo2 are empty (false)
    storage.isEmpty(['foo','foo7']) // Check if storage.foo and storage.foo7 are empty (false)
    storage.isEmpty(['foo6','foo7']) // Check if storage.foo6 and storage.foo7 are empty (true)
    storage.isEmpty('foo2','foo3'...,['foo6','foo7']) // Check if storage.foo2.foo3...foo6 and storage.foo2.foo3...foo7 are empty (true)

### `isSet()`
Check if an item exists in a storage (if not null or undefined).  
If last argument is an array (can be preceded by other arguments to parse storage), isSet() tests storage for each item of this array, and returns true only if all test return true.

    storage.set('foo','value')
    storage.set('foo2','foo3'..., {'foo4':'value4','foo5':'value5'})
    storage.set('foo6','')
    storage.isSet('foo') // Check if storage.foo exists (true)
    storage.isSet('foo6') // Check if storage.foo6 exists (true)
    storage.isSet('foo7') // Check if storage.foo7 exists (false)
    storage.isSet('foo2.foo3'...) // Check if storage.foo2.foo3... exists (true)
    storage.isSet('foo2','foo3'...) // Check if storage.foo2.foo3... exists (true)
    storage.isSet(['foo','foo2']) // Check if storage.foo and storage.foo2 exist (true)
    storage.isSet(['foo','foo7']) // Check if storage.foo and storage.foo7 exist (false)
    storage.isSet('foo2','foo3'...,['foo6','foo7']) // Check if storage.foo2.foo3...foo6 and storage.foo2.foo3...foo7 exist (false)

### `remove()`
Delete an item from a storage.  
If last argument is an array (can be preceded by other arguments to parse storage), remove() removes value of storage for each item of this array.

    storage.remove('foo') // Delete storage.foo
    storage.remove('foo.foo2.foo3'...) // Delete storage.foo.foo2.foo3...
    storage.remove('foo','foo2','foo3'...) // Delete storage.foo.foo2.foo3...
    storage.remove(['foo','foo2']) // Delete storage.foo and storage.foo2

### `removeAll()`
Truncate the storage

    storage.removeAll() // Delete all items from the storage
    storage.removeAll(true) // Only on global storages. Delete all items from the storage and reinitialize previously initialized namespaces

### `setExpires()`
Only on cookieStorage.  
Sets expires date in days (default value is null, cookie is valid for session only; only cookies set after setExpires() call will be affected).

    storage.setExpires(10) // Set expiry date to today + 10 days

This method returns the storage object, so you can:

    storage.setExpires(10).set('foo','value') // Set expiry date to today + 10 days and set a new cookie

### `setPath()`
Only on cookieStorage.  
Sets path for cookies (default value is null; only cookies set after setPath() call will be affected).

    storage.setPath('/') // Set path to '/'

This method return the storage object, so you can:

    storage.setPath('/').set('foo','value') // Set path to '/' and set a new cookie

### `setDomain()`
Only on cookieStorage.  
Sets domain for cookies (default value is null; only cookies set after setDomain() call will be affected).

    storage.setDomain('www.ndd.com') // Set domain to www.ndd.com

This method return the storage object, so you can:

    storage.setDomain('www.ndd.com').set('foo','value') // Set domain to www.ndd.com and set a new cookie

### `setConf()`
Only on cookieStorage.  
Sets cookie configuration with an object (only cookies set after setConf() call will be affected).

    storage.setConf({path:'/',expires:10,'domain':'www.ndd.com'}) // Set expiry date, domain and path

This method return the storage object, so you can:

    storage.setConf({path:'/',expires:10}).set('foo','value') // Set configuration and set a new cookie

### `setDefaultConf()`
Only on cookieStorage.  
Sets default configuration (only cookies set after setDefaultConf() call will be affected).

    storage.setDefaultConf() // Set path, domain and expiry date to null

This method return the storage object, so you can:

    storage.setDefaultConf().set('foo','value') // Set default configuration and set a new cookie

### `Storages.namespaceStorages`
Object that contains all initilialized namespace storages.

### `Storages.removeAllStorages()`
Delete all items of all storages.  
As removeAll(), if first argument given is set to true, namespaces are reinitialized.  
Else, Storages.namespaceStorages is set to an empty object and previous namespaces are lost.

### `Storages.alwaysUseJsonInStorage()`
By default, basic values (string, int...) are always stored as string in html5 storages.

    window.localStorage.setItem('foo', 1);
    window.localStorage.getItem('foo'); // Return "1"

So by default, if you do equivalent with the plugin, there will be the same behavior.

    Storages.localStorage.set('foo', 1);
    Storages.localStorage.get('foo'); // Return "1"
    
This is the case only if you store basic values in the root of the storage.  
In others cases, plugin use JSON to store values.

    Storages.localStorage.set('foo.foo2', 1);
    Storages.localStorage.get('foo.foo2'); // Return 1
    window.localStorage.getItem('foo'); // Return "{"foo2":1}"

If you want to be able to store typed values even on the root of the storages, call `Storages.alwaysUseJsonInStorage(true)`

    Storages.alwaysUseJsonInStorage(true);
    
    Storages.localStorage.set('foo', 1);
    Storages.localStorage.get('foo'); // Return 1
    window.localStorage.getItem('foo'); // Return "1"

    Storages.localStorage.set('foo', '1');
    Storages.localStorage.get('foo'); // Return "1"
    window.localStorage.getItem('foo'); // Return ""1"", because value is JSON encoded


Compatibility
-------------

JS Storage is compatible with all browsers that support storage and JSON natively (so all recents browsers) except IE8.
