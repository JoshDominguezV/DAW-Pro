    public function up()
    {
        Schema::create('rol', function (Blueprint $table) {
            $table->increments('idRol');
            $table->string('rol', 10);
            $table->timestamps();
        });
    }
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->increments('idProveedor');
            $table->string('direccion', 100);
            $table->string('nombreProveedor', 100);
            $table->string('telefono', 100);
            $table->timestamps();
        });
    }
        public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('idUsuario');
            $table->integer('idRol')->unsigned();
            $table->foreign('idRol')->references('idRol')->on('rol');
            $table->string('username', 100);
            $table->string('password', 100);
            $table->timestamps();
        });
    }
    public function up()
    {
        Schema::create('tipomueble', function (Blueprint $table) {
            $table->increments('idTipoMueble');
            $table->string('nombreMueble', 100);
            $table->timestamps();
        });
    }
        public function up()
    {
        Schema::create('marca', function (Blueprint $table) {
            $table->increments('idMarca');
            $table->integer('idProveedor')->unsigned();
            $table->foreign('idProveedor')->references('idProveedor')->on('proveedor');
            $table->string('nombreMarca', 50);
            $table->timestamps();
        });
    }
        public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->increments('idCategoria');
            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('idUsuario')->on('usuario');
            $table->string('nombreCategoria', 100);
            $table->timestamps();
        });
    }
        public function up()
    {
        Schema::create('mueble', function (Blueprint $table) {
            $table->increments('idMueble');
            $table->integer('idCategoria')->unsigned();
            $table->foreign('idCategoria')->references('idCategoria')->on('categoria');
            $table->integer('idMarca')->unsigned();
            $table->foreign('idMarca')->references('idMarca')->on('marca');
            $table->integer('idTipoMueble')->unsigned();
            $table->foreign('idTipoMueble')->references('idTipoMueble')->on('tipomueble');
            $table->string('nombreMueble', 100);
            $table->float('precio', 4, 2);
            $table->timestamps();
        });
    }
    public function up()
    {
        Schema::create('bodega', function (Blueprint $table) {
            $table->increments('idBodega');
            $table->integer('idMueble')->unsigned();
            $table->foreign('idMueble')->references('idMueble')->on('mueble');
            $table->integer('cantidadMuebles');
            $table->timestamps();
        });
    }
        public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->increments('idPago');
            $table->integer('idBodega')->unsigned();
            $table->foreign('idBodega')->references('idBodega')->on('bodega');
            $table->string('tipoPago', 25);
            $table->datetime('fechaPago');
            $table->timestamps();
        });
    }