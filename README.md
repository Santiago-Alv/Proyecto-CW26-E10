# nodesErTE - Proyecto Web con PHP 

---

## Tabla de Contenidos

- [Información General](#información-general)
- [Metas y Objetivos](#resumen-del-proyecto-metas-y-objetivos)
- [Público Objetivo](#público-objetivo-ux)
- [Propósito y Alcance](#propósito-y-alcance)
- [Escpecificaciones Funcionales](#especificaciones-funcionales)
- [Requisitos NO Funcionales](#requisitos-no-funcionales)
- [Arquitectura de la Información y UX](#arquitectura-de-la-información-y-ux)
- [Especificaciones Técnicas](#especificaciones-técnicas)

---

## INFORMACIÓN GENERAL

#### **Autores:**

- Alvarado Pérez Santiago [@Santiago-Alv](https://github.com/Santiago-Alv)
- Méndez Sánchez Sebastián [@sebmndz-s](https://github.com/sebmndz-s)
- Nava Sandoval Iztli Abraham [@iabraham120](https://github.com/iabraham120)
- Tsugaoka Otomi [@Otomi26](https://github.com/Otomi26)
- Zamora Mora Julio César [@JulioCesarZamoraMora](https://github.com/JulioCesarZamoraMora)

---

- **Título del proyecto:** nodesErTE
- **Fecha de inicio:** 28 de mayo de 2026

---

## RESUMEN DEL PROYECTO, METAS Y OBJETIVOS

- **Resumen:** nodesErTE es una pagina web que permite al alumnado ver su progeso durante el curso y contar con distintos recursos didacticos
para reforzar sus conocimientos. Al igual permitire al profesorado, tener una estadistica de su alumnado para poder observar el desempeño tanto grupal como individual, y poder tomar acciones tempranas que eviten la deserción del Estudio Tecnico.
- **Metas:**
  - Cumplir con los requerimientos en 8 dias.
  - Disminuir la cantidad de deserciones del ETE de computación.
  - Crear una pagina web interactiva y facil de comprender.
  - Proporcionar información estadística de los alumnos para una mejor atención a ellos.
- **Objetivos:**
  - Desarrollar una plataforma web funcional utilizando la aqrquitectura cliente-servidor.
  - Habilitar un foro de resolución de dudas categorizado por módulos para tratar situaciones de riesgo.
  - Generar una estadistica en base a los niveles de asistencias y calificaciones de los alumnos por grupo.

---

## PÚBLICO OBJETIVO (UX)

- Alumnado y profesorado del Estudio Tecnico Especializado en Computación, que buscan una pagina web interactiva y funcional.
  - Alumnado, que busca reforzar sus conocimientos y resolver dudas a traves de un foro con sus profesores.
  - Profesorado, que quiere observar el desempeño de sus alumnos y proporcionarle diferentes materiales didacticos.

---

## PROPÓSITO Y ALCANCE

- **En alcance (Entregables):**
  - Sistema de Inicio/Registro de sesion
  - Formulario inicial de diagnóstico y modular de retroalimentación
  - Formularios especiales para alumnos en riesgo de desercion, describiendo su situacion
  - Foro de dudas para módulos específicos o dudas generales
  - Publicación Recursos de apoyo / Material didactico por parte de los profesores
  - Mostrar y observar situaciones academicas (tablas por grupo y año en orden decrescente) por parte de los profesores
  - Division de Modulos del curso
- **Fuera de alcance:**
  - Mostrar calificaciones aproximadas
  - Crear actividades y anuncios dentro de modulos
  - Comunicacion entre alumnos directa

---

## ESPECIFICACIONES FUNCIONALES

| **MODULO**                   | **DESCRIPCIÓN**                                                                                      |
|------------------------------|------------------------------------------------------------------------------------------------------|
| Sistema de Incio de Sesión   | El profesorador podra registrar previamente usuarios y los usuarios podran inicar en su sesión       |
| Formulario                   | El sistema generara un formulario especial que el usuario debera contestar                           |
| Publicación de dudas         | El usuario podra escribir y subir dudas, y el profesorado podra contestarlas                         |
| Estadistica de usuario       | En base a un indice de deserción (grade*[asistance%]/100) se mostrara una tabla en orden descendente |

---

## REQUISITOS NO FUNCIONALES

| **CATEGORÍA** | **REQUISITOS**                                                          |
|---------------|-------------------------------------------------------------------------|
| Diseño        | Dependiendo de tu tipo de usuario la web muestra distintas vistas       |
| Accesibilidad | Capacidad de navegar con cursor y teclado                               |
| Seguridad     | No se pueden registrar usuarios que no esten dentro de la base de datos |

---

## ARQUITECTURA DE LA INFORMACIÓN Y UX

- **Patron de Navegración:** Barra de Navegación con controles para dirigirse a los sitios principales del sistema y Sidebar fija en el apartado izquierdo con:
  - Alumno: Dudas, Modulos y Recursos
  - Profesorado: Dudas, Grupos y Recursos

---

## ESPECIFICACIONES TÉCNICAS

- **Frontend:** HTML y CSS para el diseño responsivo.
- **Backend:** PHP para el control de la interaccion con la base de datos.
- **Base de Datos:** MariaDB para relacionar alumnado, grupos, profesorado y calificaciones de manera estructurada.
