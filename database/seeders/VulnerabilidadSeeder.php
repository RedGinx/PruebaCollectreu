<?php

namespace Database\Seeders;

use App\Models\Vulnerabilidad;
use Illuminate\Database\Seeder;

class VulnerabilidadSeeder extends Seeder
{
    public function run()
    {
        $vulnerabilidades = [
            [
                'nombre' => 'Inyección SQL',
                'slug'=> 'Intyeccion-SQL',
                'descripcion' => 'Permite a los atacantes ejecutar comandos SQL maliciosos a través de formularios de entrada, como los de contacto o búsqueda.',
                'solucion' => 'Utilizar consultas preparadas y validación adecuada de entradas.',
                'severidad' => 'alta',
            ],
            [
                'nombre' => 'Cross-Site Scripting (XSS)',
                'slug' => 'Cross-Site-Scripting',
                'descripcion' => 'Los atacantes inyectan scripts maliciosos en páginas vistas por otros usuarios, afectando la seguridad de la aplicación.',
                'solucion' => 'Escapar caracteres especiales y usar bibliotecas de sanitización.',
                'severidad' => 'media',
            ],
            [
                'nombre' => 'Control de acceso roto',
                'slug' => 'Control-acceso-roto',
                'descripcion' => 'Los usuarios pueden acceder a recursos o datos que no deberían, como paneles de administración o datos de otros usuarios.',
                'solucion' => 'Implementar controles de acceso adecuados y revisar permisos de usuarios.',
                'severidad' => 'alta',
            ],
            [
                'nombre' => 'Subida de archivos no segura',
                'slug' => 'Subida-de-archivos-no-segura',
                'descripcion' => 'Permite a los usuarios subir archivos maliciosos, como scripts o ejecutables, que pueden comprometer el servidor.',
                'solucion' => 'Restringir tipos de archivos permitidos y escanear archivos subidos.',
                'severidad' => 'alta',
            ],
            [
                'nombre' => 'Cross-Site Request Forgery (CSRF)',
                'slug' => 'Cross-Site-Request-Forgery',
                'descripcion' => 'Los atacantes inducen a los usuarios a ejecutar acciones no deseadas en una aplicación en la que están autenticados.',
                'solucion' => 'Utilizar tokens CSRF en formularios y verificar su validez.',
                'severidad' => 'media',
            ],
            [
                'nombre' => 'Exposición de datos sensibles',
                'slug' => 'Exposición-datos-sensibles',
                'descripcion' => 'Datos como contraseñas, claves API o información financiera se almacenan o transmiten sin cifrado adecuado.',
                'solucion' => 'Implementar cifrado TLS/SSL y almacenar contraseñas de forma segura.',
                'severidad' => 'alta',
            ],
            [
                'nombre' => 'Configuración de seguridad incorrecta',
                'slug' => 'Configuración-seguridad-incorrecta',
                'descripcion' => 'La aplicación o servidor tiene configuraciones predeterminadas inseguras o información sensible expuesta.',
                'solucion' => 'Revisar y asegurar configuraciones de seguridad en servidores y aplicaciones.',
                'severidad' => 'media',
            ],
            [
                'nombre' => 'Uso de componentes con vulnerabilidades conocidas',
                'slug' => 'Uso-componentes-vulnerabilidades-conocidas',
                'descripcion' => 'Uso de bibliotecas o frameworks desactualizados con vulnerabilidades conocidas.',
                'solucion' => 'Mantener actualizadas las dependencias y aplicar parches de seguridad.',
                'severidad' => 'media',
            ],
            [
                'nombre' => 'Falsificación de solicitudes del lado del servidor (SSRF)',
                'slug' => 'Falsificación-solicitudes-del-lado-del-servidor',
                'descripcion' => 'Los atacantes inducen a la aplicación a realizar solicitudes no autorizadas a servicios internos.',
                'solucion' => 'Validar y sanitizar las URL solicitadas por la aplicación.',
                'severidad' => 'alta',
            ],
            [
                'nombre' => 'Falta de validación de entrada',
                'slug' => 'Falta-validación-entrada',
                'descripcion' => 'Los datos proporcionados por el usuario no se validan correctamente, permitiendo ataques como inyecciones o desbordamientos.',
                'solucion' => 'Implementar validación y saneamiento de todas las entradas del usuario.',
                'severidad' => 'alta',
            ],
        ];

        foreach ($vulnerabilidades as $vulnerabilidad) {
            Vulnerabilidad::create($vulnerabilidad);
        }
    }
}
