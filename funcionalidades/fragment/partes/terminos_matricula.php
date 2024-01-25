<div id="conte-value">
    <div class="col-md-12 text-center">
        <h2>Terminos y condiciones</h2>
    </div>
    <div class="col-md-offset-2 col-md-8 text-justify">
        <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
        <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
        <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
    </div>
    <div class="col-md-offset-2 col-md-8">
        <form v-on:submit.prevent="acep_termino">
            <div class="d-flex mb-5 align-items-center text-right">
                <div class="control__indicator"></div>
                <input id="checkter" required v-model="checkboxterm"  type="checkbox" >

                <label for="checkter" class="control control--checkbox mb-0"><span class="caption">Aceptar Terminos</span>
                </label>
            </div>
            <div class="col-md-12  text-center">
                <input type="submit" value="Continuar" class="btn btn-primary col-md-offset-4 col-md-4">
            </div>

        </form>

    </div>
</div>


<script>
    $(document).ready(function () {
        const APP = new Vue({
            el:'#conte-value',
            data:{
                nombre:'Bruno',
                checkboxterm:false,
                compiled:null
            },
            methods:{
                acep_termino(){
                    if (this.checkboxterm){
                        $("#loader-menor").show();
                        $.ajax({
                            type: "POST",
                            url: URL+'/ajax/matricula',
                            data: {tipo:'vrf',matr:$("#matricula").val()},
                            success: function (rest) {
                                console.log(rest);
                                rest = JSON.parse(rest);
                                if (rest.res){
                                    renderHTML(rest.dom)
                                }


                            }
                        });

                    }else{
                        swal('Deve aceptar los terminos');
                    }
                }
            }
        });
    })
</script>