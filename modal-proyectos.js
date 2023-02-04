   // MODAL VER FECHA_PRE

   var ModalEditarFechaPre = document.getElementById("modal-ver-fecha_pre");
   var ModalAbrirEditarFechaPre = document.querySelectorAll('.ver-fecha_pre');
            
           
             ModalAbrirEditarFechaPre.forEach(button =>{
           
               button.addEventListener('click', EditarFechaPre);
             });
           
             async function EditarFechaPre(e){
              
               let datoFP = e.currentTarget.getAttribute("value");
               const dataFP = await fetch("modal-fecha-presentacio.php?id="+datoFP);
               const FP = await dataFP.text();
           
               ModalEditarFechaPre.innerHTML = FP;
               ModalEditarFechaPre.showModal();
              
               
             };

             // MODAL VER JURADO

  var ModalEditarJurado = document.getElementById("modal-ver-jurado");
   var ModalAbrirEditarJurado = document.querySelectorAll('.ver-jurado');
            
           
             ModalAbrirEditarJurado.forEach(button =>{
           
               button.addEventListener('click', EditarJurado);
             });
           
             async function EditarJurado(e){
          
               let datoJ = e.currentTarget.getAttribute("value");
               const dataJ = await fetch("modal-ver-jurado.php?id="+datoJ);
               const J = await dataJ.text();
           
               ModalEditarJurado.innerHTML = J;
               ModalEditarJurado.showModal();
              
               
             }

  // MODAL VER VEREDICTO

  var ModalEditarVeredicto = document.getElementById("modal-ver-veredicto");
  var ModalAbrirEditarVeredicto = document.querySelectorAll('.ver-veredicto');
                     
  ModalAbrirEditarVeredicto.forEach(button =>{
                    
  button.addEventListener('click', EditarVeredicto);});
                    
  async function EditarVeredicto(e){
                   
  let datoV = e.currentTarget.getAttribute("value");
  const dataV = await fetch("modal-ver-veredicto.php?id="+datoV);
  const V = await dataV.text();
                    
  ModalEditarVeredicto.innerHTML = V;
  ModalEditarVeredicto.showModal();
                       
  }
   

    // MODAL EDITAR RECINTO

    var ModalEditarRecinto = document.getElementById("modal-ver-recinto");
    var ModalAbrirEditarRecinto = document.querySelectorAll('.ver-recinto');
                       
    ModalAbrirEditarRecinto.forEach(button =>{
                      
    button.addEventListener('click', Recinto);});
                      
    async function Recinto(e){
                     
    let datoR = e.currentTarget.getAttribute("value");
    const dataR = await fetch("editarRec.php?id="+datoR);
    const R = await dataR.text();
                      
    ModalEditarRecinto.innerHTML = R;
    ModalEditarRecinto.showModal();
                         
    }

    
    // MODAL ASIGNAR RECINTO

    var ModalAsignarRecinto = document.getElementById("modal-asignar-recinto");
    var ModalAbrirAsignarRecinto = document.querySelectorAll('.asignar-recinto');
                       
    ModalAbrirAsignarRecinto.forEach(button =>{
                      
    button.addEventListener('click', AsignarRecinto);});
                      
    async function AsignarRecinto(e){
                     
    let datoAR = e.currentTarget.getAttribute("value");
    const dataAR = await fetch("proyectos-asignar-recinto.php?id="+datoAR);
    const AR = await dataAR.text();
                      
    ModalAsignarRecinto.innerHTML = AR;
    ModalAsignarRecinto.showModal();
                         
    }