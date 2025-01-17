import React, { useState } from 'react';

function CierreCurso() {
  const [cursoCerrado, setCursoCerrado] = useState(false);

  const cerrarCurso = () => {
    // Lógica para cerrar el curso (puede ser una petición API o algo más)
    setCursoCerrado(true);
  };

  return (
    <div>
      <h2>{cursoCerrado ? 'Curso Cerrado' : 'Cierre de Curso'}</h2>
      <button onClick={cerrarCurso}>
        {cursoCerrado ? 'Curso Cerrado' : 'Cerrar Curso'}
      </button>
    </div>
  );
}

export default CierreCurso;
