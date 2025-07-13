### 📝  Taller Para A1– PHP y MySQL

Crear una API REST sencilla que permita gestionar productos, categorías y promociones usando PHP sin frameworks, conectada a una base de datos MySQL. Debe funcionar correctamente (En equipos de Campus o Contenedores) y permitir pruebas con con Postman.

**Lo que tienes que realizar:**

Vas a crear una API que permita:

- Ver todos los productos, uno solo, crear, editar y borrar.
- Ver todas las categorias, crear nuevas, editar y eliminar.
- Asignar promociones a productos.
- Obtener la lista de productos con su categoria y si tienen o no promoción.

**Estructura de las tablas**

Base de datos: `taller_api`

Tabla `categorias`:

- id (clave primaria, autoincremental)
- nombre (varchar)

Tabla `productos`:

- id (clave primaria, autoincremental)
- nombre (varchar)
- precio (decimal)
- categoria_id (clave foránea que apunta a `categorias.id`)

Tabla `promociones`:

- id (clave primaria, autoincremental)
- descripcion (texto)
- descuento (decimal entre 0 y 100 representa %)
- producto_id (clave foránea que apunta a `productos.id`)

**Requisitos mínimos del taller**

- Todos los datos o respuestas deben ir y venir en `JSON`.
- Se debe poder hacer `CRUD` completo en las 3 tablas.
- Cuando se liste un producto, debe mostrar su categoria y si tiene promoción activa.
- La base de datos se inicializa con 3 categorias, 5 productos, y 2 promociones como requerido.
- Cada archivo PHP debe ser modular (uno para la conexion con la db y uno para cada entidad o endpoint).
- Nada de HTML, todo es backend puro (Es un API REST, por ende usa bien los `Response Code`).
- Toda respuesta debe ser en JSON, clara y bien estructurada.
- Se debe usar PDO para conectarte a MySQL.
- La API debe funcionar desde Postman usando `localhost` o el puerto expuesto del contenedor, además, de incluir las colecciones de Postman.

**Reto adicional (solo si se siente con confianza de Quitarle 2 Puntos a Santiago 🧐)**
Haz una ruta que devuelva todos los productos que tengan una promoción mayor al 20%.

**Sugerencias de Endpoints:**

1. Productos 
   1. GET /productos
   2. GET /productos/3
   3. POST /productos
   4. PUT /productos/2
   5. DELETE /productos/5
2. Categorias
   1. GET /categorias
   2. POST /categorias
   3. ... ya sabes como va el CRUD
3. Promociones
   1. GET /promociones
   2. POST /promociones
   3. ... ya sabes como va el CRUD

**Entrega esperada:**
Un proyecto en repositorio de GitHub, con conexión lista, tablas funcionando y endpoints probados con al menos unos 10 registros  de datos por tabla (Manuales o desde Postman 😉).

**Agradecimientos y Responsables:**

- Santiago, **Kevin** y Julian. 🗿.