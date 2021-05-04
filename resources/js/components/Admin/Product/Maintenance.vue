<template>
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Categories</h4>
                        <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus ccolor"></i>
                                </button>
                                <button type="button" class="btn btn-tool" @click="openModal">
                                    <i class="fa fa-plus-circle ccolor"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th class="w-15p">Category Name</th>
                                        <th class="w-15p">Slug</th>
                                        <th class="w-15p">Parent Category</th>
                                        <th>Description</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-show="!isLoading">
                                        <td colspan="7" class="text-center"><div  class="lds-ellipsis"><div></div><div></div><div></div></div></td>
                                    </tr>
                                    <tr v-for="cat in categories.data" :key="cat.id">
                                        <td>{{ cat.name }}</td>
                                        <td>{{ cat.slug }}</td>
                                        <td>{{ getParentName(cat.parent_id) }}</td>
                                        <td>{{ cat.description }}</td>
                                        <td class="text-center"> 
                                            <a class="pointer" @click="editCategory(cat)">
                                                <i class="fa fa-edit ccolor"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer ">
                            <pagination class="float-right" :data="categories" @pagination-change-page="pageCategories"></pagination>
                        </div>
                    </div>
                </div>
        </div>
<!-- MODALS -->
    <div class="modal fade" id="modal" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg card-info">
        <div class="modal-content">
                <form  @submit.prevent="editmode ? updateCategory() : createCategory()">
                <div class="modal-header">
                    <h4 class="modal-title" v-show="!editmode" >Add Category</h4>
                    <h4 class="modal-title" v-show="editmode">Update Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                             <div class="form-group">
                                <label>Category Name</label>
                                <input v-model="form.name" type="text" name="name" @input="slug()"  placeholder="Enter Category" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <p class="text-muted">The name is how it appears on your site.</p>
                                <has-error :form="form" field="name"></has-error>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Slug</label>
                                <input v-model="form.slug" type="text" name="slug" placeholder="Enter Slug" class="form-control" :class="{ 'is-invalid': form.errors.has('slug') }">
                                <p class="text-muted">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                                <has-error :form="form" field="slug"></has-error>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Parent Category</label>
                                <v-select label="name" name="parent_cat" v-model="form.parent_cat" :options="get_categories" placeholder="None"></v-select>
                                <p class="text-muted">Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.</p>
                                <has-error :form="form" field="name"></has-error>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Description</label>
                                 <textarea v-model="form.description" class="form-control" rows="3"></textarea>
                                <p class="text-muted">The description is not prominent by default; however, some themes may show it.</p>
                                <has-error :form="form" field="description"></has-error>
                            </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button v-show="editmode" type="submit" class="btn btn-primary">Update</button>
                    <button v-show="!editmode" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        </div>
    </div>

<!-- END MODALS -->

        </div>
    </section>
</template>
<script>
    require('promise.prototype.finally').shim();
    export default {
        data () {
            return {
              editmode: false,
              isLoading: false,
              categories: {},
              get_categories: [],
              form: new Form({
                id: '',
                name: '',
                slug:'',
                parent_cat:'',
                desciption:'',
              }),
            }
          },
         
         methods: {
            openModal(){
                this.editmode = false;
                this.form.reset();
                $('#modal').modal('show');
            },
            slug(){
                var string =  this.form.name

               string = string.split(' ').map(function (s, i) {
                    return i && s.length ? '-' + s[0].toLowerCase() + s.substring(1) : s;
                }).join('');
                this.form.slug = string.toLowerCase()
            },
            getParentName(id){
                var name
                for (let index = 0; index < this.categories.length; index++) {
                    if(id == this.categories.id){
                        name = this.categories.name
                        console.log(this.categories[i].name)
                    }
                }
              
                
            },
            createCategory(){
                this.$Progress.start();
                this.form.post('api/product-categories')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    $('#modal').modal('hide')
                    this.form.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'Category Added'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            },
            updateCategoryp(){
                 this.$Progress.start();
                this.form.put('api/schoolarships-grant/'+this.form.id)
                .then(() => {
                    $('#modal').modal('hide');
                     Toast.fire({
                        icon: 'success',
                        title: 'Scholarship Updated!'
                        })
                        this.$Progress.finish();
                        Fire.$emit('AfterCreate');
                         this.form.reset();
                         this.editmode = false;
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
            //  sySelected(data){
            //     this.sy_selected = data;
            //     axios.get("api/semester/"+data.id).then(({ data }) => (this.get_semesters = data));
            //     this.semester = ''
                
            // },
            editCategory(item){
                this.editmode = true;
                this.form.reset();
                this.form.fill(item);
                $('#modal').modal('show');
            },
             pageCategories(page = 1) {
                axios.get('api/product-categories?page=' + page)
                    .then(response => {
                        this.categories = response.data.data;
                    });
            },

            loadSettings(){
                axios.get('api/product-categories')
                    .then((data) => {
                    this.isLoading = false
                    this.categories = data.data.data
                    
                    })
                    .finally(() => {
                        this.isLoading = true
                    });
          
            },
         }, 
       async created() {

            axios.get("api/get-categories").then(({ data }) => (this.get_categories = data));
        //     axios.get("api/getstudents").then(({ data }) => (this.get_students = data));
        //     axios.get("api/getscholarships").then(({ data }) => (this.get_scholarships = data));
            
             this.loadSettings();
 
           Fire.$on('AfterCreate',() => {
               axios.get('api/product-categories')
                    .then((data) => {
                    this.isLoading = false
                    this.categories = data.data.data
                    
                    })
                    .finally(() => {
                        this.isLoading = true
                    });
            });
           
        }
    }

</script>
