import React, { useEffect, useState } from "react";

function Cursos() {
  const [cursos, setCursos] = useState([]);

  useEffect(() => {
    fetch("http://localhost/capacitaciones/api/cursos.php")
      .then((response) => response.json())
      .then((data) => setCursos(data))
      .catch((error) => console.error("Error fetching cursos:", error));
  }, []);

  return (
    <div>
      <h2>Listado de Cursos</h2>
      {cursos.length === 0 ? (
        <p>No hay cursos disponibles.</p>
      ) : (
        <ul>
          {cursos.map((curso) => (
            <li key={curso.id}>{curso.nombre}</li>
          ))}
        </ul>
      )}
    </div>
  );
}

export default Cursos;
