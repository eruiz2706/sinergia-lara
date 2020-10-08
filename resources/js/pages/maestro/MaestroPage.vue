<template>
<div id="wrapper">
  <div id="content-wrapper" class="d-flex flex-column mt-4">
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between pb-4">
          <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <label>Paises</label>
          <select class="form-control" v-model="pais">
            <option value=''> -</option>
            <template v-for="pais in listaPaises">
              <option v-bind:value="pais.id">{{ pais.nombre }}</option>
            </template>
          </select>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
          <label>Departamentos</label>
          <select class="form-control" v-model="departamento" v-on:change="changeDepartamento()">
            <option value=''> -</option>
            <template v-for="departamento in listaDepartamentos">
              <option v-bind:value="departamento.id">{{ departamento.nombre }}</option>
            </template>
          </select>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
          <label>Ciudades</label>
          <select class="form-control" v-model="ciudad">
            <option value=''> -</option>
            <template v-for="ciudad in listaCiudades">
              <option v-bind:value="ciudad.id">{{ ciudad.nombre }}</option>
            </template>
          </select>
          </div>
        </div>
        
        <div class="col-md-4">
          <button type="button" class="btn btn-primary" @click.prevent="buscar()">Buscar</button>
        </div>
      </div>

      <div class="row pt-3">
          <div class="col-md-12">
              <div class="card shadow ">
              <div class="card-header pt-4">
                  <h6 class="font-weight-bold text-primary">
                    Lista de usuarios
                  </h6>
              </div>
              <div class="card-body">
                  <div class="d-flex justify-content-center" v-if="loadingPage">
                      <div class="spinner-border text-primary mt-4 mb-4" role="status">
                      <span class="sr-only">Loading...</span>
                      </div>
                  </div>
                  <div class="table-responsive" >
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>Usuario</th>
                                  <th>Pais</th>
                                  <th>Departamento</th>
                                  <th>Ciudad</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="usuario in listaUsuarios">
                                  <td>{{ usuario.nombre }}</td>
                                  <td>{{ usuario.pais }}</td>
                                  <td>{{ usuario.departamento }}</td>
                                  <td>{{ usuario.ciudad }}</td>
                              </tr>
                          </tbody>
                          <tfoot v-if="paginas>1">
                              <tr>
                                  <th>Usuario</th>
                                  <th>Pais</th>
                                  <th>Departamento</th>
                                  <th>Ciudad</th>
                              </tr>
                          </tfoot>
                      </table>
  
                      <div class="d-flex align-items-center justify-content-end" v-if="paginas>1">
                          <paginate
                          :page-count="paginas"
                              :prev-text="'Anterior'"
                              :next-text="'Siguiente'"
                              :container-class="'pagination'"
                              :page-class="'page-item'"
                              :page-link-class="'page-link'"
                              :prev-class="'page-item'"
                              :prev-link-class="'page-link'"
                              :next-class="'page-item'"
                              :next-link-class="'page-link'"
                              :active-class="'active'"
                              :disabled-class="'disabled'"
                              :click-handler="clickPage"
                          >
                          </paginate>
                      </div>
                  </div>
              </div>
            </div>
          </div>
      </div>
      </div>
  </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            req: axios.create({
                baseUrl:  BASE_URL
            }),
            listaUsuarios: [],
            listaPaises: [],
            listaDepartamentos: [],
            listaCiudades: [],
            pais: '',
            departamento: '',
            ciudad: '',
            paginas: 0,
            loadingPage: false,
            filtros:{}
        }
    },
    mounted() {
      this.getPaises();
      this.getDepartamentos();
      this.getListado();
      this.getCiudades();
    },
    methods:{
        /**
         * Metodo para filtrar en el select de ciudades, aquellas que pertenezcan al departamento seleccionado
         */
        changeDepartamento(){
          this.ciudad='';
          this.filtros.ciudad='';
          this.getCiudades(this.departamento);
        },
        /**
        * Metodo para poder traer la informacion de usuario filtrada 
        */
        buscar(){
          this.filtros = {
            pais: this.pais,
            departamento: this.departamento,
            ciudad: this.ciudad
          }
          this.getListado(this.filtros);
        },
         /**
        * Metodo para poder obtener listado de paises
        */
        getPaises(){
          this.req.get('maestro/paises').then( response => {
            this.listaPaises = response.data.paises;
             // console.log(response);
          }).catch( error =>{
              console.log(error);
          });
        },
         /**
        * Metodo para poder obtener listado de departamentos
        */
        getDepartamentos(){
          this.req.get('maestro/departamentos').then( response => {
            this.listaDepartamentos = response.data.departamentos;
             // console.log(response);
          }).catch( error =>{
              console.log(error);
          });
        },
         /**
        * Metodo para poder obtener listado de ciudades
        */
        getCiudades(idDepartamento=''){
          this.req.post('maestro/ciudades',{departamento:idDepartamento}).then( response => {
            this.listaCiudades = response.data.ciudades;
            //  console.log(response);
            console.log(this.filtros);
          }).catch( error =>{
              console.log(error);
          });
        },
         /**
        * Metodo para al momento de cambiar de pagina, obtenga el nuevo listado de datos de la pagina
        */
        clickPage: function(pageNum) {
            this.loadingPage = true;
            this.req.post(`maestro/usuarios?page=${pageNum}`,this.filtros).then( response => {
                this.loadingPage = false;
                this.listaUsuarios = response.data.usuarios.data;
            }).catch( error =>{
                this.loadingPage = false;
              console.log(error);
            });
        },
         /**
        * Metodo para obtener el listado de usuarios
        */
        getListado(filtros={}){
            console.log(filtros);
            this.loadingPage = true;
            this.req.post('maestro/usuarios',filtros).then( response => {
                this.loadingPage = false;
                this.listaUsuarios = response.data.usuarios.data;
                this.paginas = response.data.usuarios.last_page;
                console.log(response);
            }).catch( error =>{
                this.loadingPage = false;
                console.log(error);
            });
        }
    },
}
</script>

<style>
</style>