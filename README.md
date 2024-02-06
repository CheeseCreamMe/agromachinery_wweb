<h1>Code</h1>
<h2>Languejes</h2>
<p><strong>JS:</strong>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/480px-Unofficial_JavaScript_logo_2.svg.png" width="50" alt="JS"></p>
<p><strong>PHP:</strong>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/300px-PHP-logo.svg.png" alt="PHP" width="50"></p>
<p><strong>HTML:</strong><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/200px-HTML5_logo_and_wordmark.svg.png?20160623125136" alt="HTML" width="50"></p>
<p><strong>CSS:</strong><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/200px-CSS3_logo_and_wordmark.svg.png?20160623125136" alt="CSS" width="50"></p>
<p><strong>MySQL:</strong><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Mysql.svg/75px-Mysql.svg.png" alt="MySQL" width="50"></p>
<br>
<h2>frameworks</h2>
<p><strong>Jquery:</strong> <a href="https://jquery.com/" target="_blank" rel="noopener noreferrer"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/JQuery-Logo.svg/375px-JQuery-Logo.svg.png" alt="JQuery" width="50"></a></p>
<p><strong>Bootstrap:</strong> <a href="https://getbootstrap.com/" target="_blank" rel="noopener noreferrer"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/200px-Bootstrap_logo.svg.png?20160623125136" alt="Bootstrap" width="50"></a></p>

<p>jquery</p>
<h1>Folder Structure</h1>
<h3>Model View Controller(MVC)</h3>


```
└── 📁agromachinery_wweb
    └── .htaccess
    └── 📁api
        └── 📁categorias
            └── ajaxCategorias.php
            └── delete.js
            └── edit.js
            └── read.js
        └── 📁marcas
            └── ajaxMarcas.php
            └── delete.js
            └── edit.js
            └── read.js
        └── 📁productos
            └── ajaxProductos.php
            └── delete.js
            └── edit.js
            └── read.js
    └── 📁app
        └── 📁connection
            └── bdValues.php
            └── connection.php
        └── 📁core
            └── 📁controller
                └── categoriasController.php
                └── marcasController.php
                └── productosController.php
                └── viewController.php
            └── 📁model
                └── categoriasModel.php
                └── marcasModel.php
                └── productosModel.php
                └── viewModel.php
            └── 📁view
                └── 📁pages
                    └── 📁admin
                        └── 📁categorias
                        └── categoriasAdminPage.php
                        └── 📁marca
                        └── marcasAdminPage.php
                        └── 📁productos
                        └── productosAdminPage.php
                    └── 📁public
                        └── aboutViewPage.php
                        └── homeViewPage.php
                        └── notFoundViewPage.php
                        └── productsViewPage.php
                └── 📁template
                    └── 📁admin
                        └── adminDashBoard.php
                        └── footer.php
                        └── header.php
                        └── login.php
                    └── 📁public
                        └── footer.php
                        └── header.php
                        └── publicTemplate.php
        └── 📁resources
            └── 📁css
                └── aside.css
                └── footer.css
                └── header.css
                └── home.css
                └── template.css
                └── vars.css
            └── 📁images
                └── 📁marca
                 └──imagenes necesarias para marcas
                └── 📁productos
                    └──imagenes necesarias para productos
    └── index.php
    └── 📁public
        └── 📁icons
            └── logo-agromachienry.webp
        └── 📁images
            └──imagenes por defecto
        └── 📁values
            └── aboutUS.php
            └── headerAndFooter.php
    └── README.md
```
