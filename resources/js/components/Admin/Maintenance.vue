<template>
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h4 class="card-title mb-0">School Years</h4>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus ccolor"></i>
                                </button>
                                <button type="button" class="btn btn-tool" @click="openSchoolYearModal">
                                    <i class="fa fa-plus-circle ccolor"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr v-if="!school_years.data.length">
                                        <td colspan="2" class="text-center nodata">No Data Found</td>
                                    </tr> -->
                                    <tr v-show="!SYisLoading">
                                        <td colspan="2" class="text-center"><div  class="lds-ellipsis"><div></div><div></div><div></div></div>
                                        </td>
                                    </tr>
                                    <tr v-for="item in school_years.data" :key="item.id">
                                        <td>{{item.school_year}}</td>
                                        <td class="text-center"> 
                                            <a class="pointer" @click="editSchoolYear(item)">
                                                <i class="fa fa-edit ccolor"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer ">
                            <pagination class="float-right" :data="school_years" @pagination-change-page="pageSchoolYear"></pagination>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Semesters</h4>
                        <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus ccolor"></i>
                                </button>
                                <button type="button" class="btn btn-tool" @click="openSemesterModal">
                                    <i class="fa fa-plus-circle ccolor"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th>School Year</th>
                                        <th>Semester</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-show="!SEMisLoading">
                                        <td colspan="3" class="text-center"><div  class="lds-ellipsis"><div></div><div></div><div></div></div></td>
                                    </tr>
                                    <tr v-for="sy in semesters.data" :key="sy.id">
                                        <td>{{sy.schoolyear.school_year}}</td>
                                        <td>{{sy.semester}}</td>
                                        <td class="text-center"> 
                                            <a class="pointer" @click="editSemester(sy)">
                                                <i class="fa fa-edit ccolor"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer ">
                            <pagination class="float-right" :data="semesters" @pagination-change-page="pageSemester"></pagination>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Departments</h4>
                        <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus ccolor"></i>
                                </button>
                                <button type="button" class="btn btn-tool" @click="openDepartmentModal">
                                    <i class="fa fa-plus-circle ccolor"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr v-show="!DEPisLoading">
                                        <td colspan="2" class="text-center"><div  class="lds-ellipsis"><div></div><div></div><div></div></div></td>
                                    </tr>
                                    <tr v-for="dep in departments.data" :key="dep.id">
                                        <td>{{dep.department}}</td>
                                        <td class="text-center"> 
                                            <a class="pointer" @click="editDepartment(dep)">
                                                <i class="fa fa-edit ccolor"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer ">
                            <pagination class="float-right" :data="departments" @pagination-change-page="pageDepartment"></pagination>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Courses</h4>
                        <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus ccolor"></i>
                                </button>
                                <button type="button" class="btn btn-tool" @click="openCourseModal">
                                    <i class="fa fa-plus-circle ccolor"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Course</th>
                                        <th>Abbreviation</th>
                                        <th class="action">Year Levels</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-show="!COisLoading">
                                        <td colspan="5" class="text-center"><div  class="lds-ellipsis"><div></div><div></div><div></div></div></td>
                                    </tr>
                                    <tr v-for="course in courses.data" :key="course.id">
                                        <td>{{ course.department.department }}</td>
                                        <td>{{course.course}}</td>
                                        <td>{{course.abbreviation}}</td>
                                        <td class="text-center">{{course.year_level}}</td>
                                        <td class="text-center"> 
                                            <a class="pointer" @click="editCourse(course)">
                                                <i class="fa fa-edit ccolor"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer ">
                            <pagination class="float-right" :data="courses" @pagination-change-page="pageCourse"></pagination>
                        </div>
                    </div>
                </div>
        </div>
<!-- MODALS -->

    <!-- #School Year Modal -->
    <div class="modal fade" id="modal-schoolyear" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-sm card-info">
        <div class="modal-content">
                <form  @submit.prevent="editmode ? updateSchoolYear() : createSchoolYear()">
                <div class="modal-header">
                    <h4 class="modal-title" v-show="!editmode" >Add School Year</h4>
                    <h4 class="modal-title" v-show="editmode">Update School Year</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>School Year</label>
                        <input v-model="form.school_year" type="text" name="name"
                            placeholder="Enter school year..."
                            class="form-control" :class="{ 'is-invalid': form.errors.has('school_year') }">
                        <has-error :form="form" field="school_year"></has-error>

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
    <!-- Semester Modal -->
    <div class="modal fade" id="modal-semester" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-sm card-info">
        <div class="modal-content">
                <form  @submit.prevent="editmode ? updateSemester() : createSemester()">
                <div class="modal-header">
                    <h4 class="modal-title" v-show="!editmode" >Add Semester</h4>
                    <h4 class="modal-title" v-show="editmode">Update Semester</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>School Year</label>
                        <select v-model="semesterForm.school_year_id"  name="school_year" class="form-control" :class="{ 'is-invalid': semesterForm.errors.has('school_year') }"> 
                            <option selected="" disabled="" value="">Select school year</option> 
                            <option v-for="sy in get_school_years" :key="sy.id" :value="sy.id">{{sy.school_year}}</option>
                        </select>
                        <has-error :form="semesterForm" field="school_year"></has-error>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <input v-model="semesterForm.semester" type="text" name="name"
                            placeholder="Enter semester..."
                            class="form-control" :class="{ 'is-invalid': semesterForm.errors.has('semester') }">
                        <has-error :form="semesterForm" field="semester"></has-error>
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
    <!-- Department Modal -->
    <div class="modal fade" id="modal-department" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-sm card-info">
        <div class="modal-content">
                <form  @submit.prevent="editmode ? updateDepartment() : createDepartment()">
                <div class="modal-header">
                    <h4 class="modal-title" v-show="!editmode" >Add Deparment</h4>
                    <h4 class="modal-title" v-show="editmode">Update Deparment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Department</label>
                        <input v-model="departmentForm.department" type="text" name="department"
                            placeholder="Enter department.."
                            class="form-control" :class="{ 'is-invalid': departmentForm.errors.has('department') }">
                        <has-error :form="departmentForm" field="department"></has-error>
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
    <!-- Course Modal -->
    <div class="modal fade" id="modal-course" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-sm card-info">
        <div class="modal-content">
                <form  @submit.prevent="editmode ? updateCourse() : createCourse()">
                <div class="modal-header">
                    <h4 class="modal-title" v-show="!editmode" >Add Course</h4>
                    <h4 class="modal-title" v-show="editmode">Update Course</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Department</label>
                        <select v-model="courseForm.department_id"  name="department_id" class="form-control" :class="{ 'is-invalid': courseForm.errors.has('department_id') }"> 
                            <option selected="selected" disabled="disabled" value="">Select department</option> 
                            <option v-for="dep in get_departments" :key="dep.id" :value="dep.id">{{dep.department}}</option>
                        </select>
                        <has-error :form="courseForm" field="department_id"></has-error>
                    </div>
                    <div class="form-group"> 
                        <label>Course</label>
                        <input v-model="courseForm.course" type="text" name="course"
                            placeholder="Enter course..."
                            class="form-control" :class="{ 'is-invalid': courseForm.errors.has('course') }">
                        <has-error :form="courseForm" field="course"></has-error>
                    </div>
                    <div class="form-group"> 
                        <label>Abbreviation</label>
                        <input v-model="courseForm.abbreviation" type="text" name="abbreviation"
                            placeholder="Enter abbreviation..."
                            class="form-control" :class="{ 'is-invalid': courseForm.errors.has('abbreviation') }">
                        <has-error :form="courseForm" field="abbreviation"></has-error>
                    </div>
                    <div class="form-group">
                        <label>Number of Year Levels</label>
                        <input v-model="courseForm.year_level" type="text" name="name"
                            placeholder="Enter number of year levels..."
                            class="form-control" :class="{ 'is-invalid': courseForm.errors.has('year_level') }">
                        <has-error :form="courseForm" field="year_level"></has-error>
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
              SYisLoading: false,
              SEMisLoading: false,
              DEPisLoading: false,
              COisLoading: false,
              school_years:{},
              semesters:{},
              get_school_years: {},
              get_departments:{},
              departments:{},
              courses:{},
              form: new Form({
                id: '',
                school_year: '',
              }),
              semesterForm: new Form({
                id: '',
                school_year_id: '',
                semester: '',
              }),
              departmentForm : new Form({
                  id: '',
                  department: '',
              }),
              courseForm: new Form({
                id: '',
                course: '',
                abbreviation: '',
                year_level: '',
              }),
            }
          },
         
         methods: {

         //  METHODS FOR SCHOOL YEAR

            openSchoolYearModal(){
                this.editmode = false;
                this.form.reset();
                $('#modal-schoolyear').modal('show');
            },
            createSchoolYear(){
                this.$Progress.start();
                this.form.post('api/schoolyear')
                .then(()=>{
                    Fire.$emit('AfterCreateSchoolYear');
                    $('#modal-schoolyear').modal('hide')
                    this.form.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'School Year Added'
                        })
                     axios.get("api/getschoolyear").then(({ data }) => (this.get_school_years = data));
                    this.$Progress.finish();
                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            },
            updateSchoolYear(){
                 this.$Progress.start();
                this.form.put('api/schoolyear/'+this.form.id)
                .then(() => {
                    $('#modal-schoolyear').modal('hide');
                     Toast.fire({
                        icon: 'success',
                        title: 'School Year Updated!'
                        })
                         axios.get("api/getschoolyear").then(({ data }) => (this.get_school_years = data));
                        this.$Progress.finish();
                         Fire.$emit('AfterUpdateSchoolYear');
                         this.form.reset();
                         this.editmode = false;
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
            editSchoolYear(item){
                this.editmode = true;
                this.form.reset();
                $('#modal-schoolyear').modal('show');
                this.form.fill(item);
            },
             pageSchoolYear(page = 1) {
                axios.get('api/schoolyear?page=' + page)
                    .then(response => {
                        this.school_years = response.data.data;
                    });
            },
         
        // END SCHOOL YEAR METHODS


        // METHODS FOR SEMESTER
         openSemesterModal(){
                this.editmode = false;
                this.semesterForm.reset();
                $('#modal-semester').modal('show');
            },
         createSemester(){
                this.$Progress.start();
                this.semesterForm.post('api/semester')
                .then(()=>{
                    Fire.$emit('AfterCreateSemester');
                    $('#modal-semester').modal('hide')
                    this.semesterForm.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'Semester Added'
                        })
                    this.$Progress.finish();
                })
                .catch((error)=>{
                   this.$Progress.fail();
                   Toast.fire({
                        icon: 'warning',
                        title: 'Ops! Something went wrong.'
                        })
                })
            },
        editSemester(sy){
                this.editmode = true;
                this.semesterForm.reset();
                $('#modal-semester').modal('show');
                this.semesterForm.fill(sy);
            },
        updateSemester(){
            this.$Progress.start();
            this.semesterForm.put('api/semester/'+this.semesterForm.id)
            .then(() => {
                $('#modal-semester').modal('hide');
                    Toast.fire({
                    icon: 'success',
                    title: 'Semester Updated!'
                    })
                    this.$Progress.finish();
                        Fire.$emit('AfterUpdateSemester');
                        this.semesterForm.reset();
                        this.editmode = false;
            })
            .catch(() => {
                this.$Progress.fail();
            });
        },        
        
         pageSemester(page = 1) {
                axios.get('api/semester?page=' + page)
                    .then(response => {
                        this.semesters = response.data.data;
                    });
            },

        // END SEMESTER METHODS

        // DEPARTMENT METHODS
        
        openDepartmentModal(){
                this.editmode = false;
                this.departmentForm.reset();
                $('#modal-department').modal('show');
            },
        createDepartment(){
                this.$Progress.start();
                this.departmentForm.post('api/department')
                .then(()=>{
                    Fire.$emit('AfterCreateDepartment');
                    $('#modal-department').modal('hide')
                    this.departmentForm.reset();
                    axios.get("api/getdepartment").then(({ data }) => (this.get_departments = data));
                    Toast.fire({
                        icon: 'success',
                        title: 'Department Added'
                        })
                    this.$Progress.finish();
                })
                .catch((error)=>{
                   this.$Progress.fail();
                   Toast.fire({
                        icon: 'warning',
                        title: 'Ops! Something went wrong.'
                        })
                })
            },
        editDepartment(dep){
                this.editmode = true;
                this.departmentForm.reset();
                $('#modal-department').modal('show');
                this.departmentForm.fill(dep);
            },
        updateDepartment(){
            this.$Progress.start();
            this.departmentForm.put('api/department/'+this.departmentForm.id)
            .then(() => {
                $('#modal-department').modal('hide');
                    Toast.fire({
                    icon: 'success',
                    title: 'Department Updated!'
                    })
                    this.$Progress.finish();
                    axios.get("api/getdepartment").then(({ data }) => (this.get_departments = data));
                        Fire.$emit('AfterUpdateDepartment');
                        this.departmentForm.reset();
                        this.editmode = false;
            })
            .catch(() => {
                this.$Progress.fail();
            });
        },    
        pageDepartment(){
             axios.get('api/department?page=' + page)
                    .then(response => {
                        this.departments = response.data.data;
                    });
        },

        // END DEPARTMENT METHODS

        // COURSE METHODS
        openCourseModal(){
                this.editmode = false;
                this.courseForm.reset();
                $('#modal-course').modal('show');
            },
        createCourse(){
                this.$Progress.start();
                this.courseForm.post('api/course')
                .then(()=>{
                    Fire.$emit('AfterCreateCourse');
                    $('#modal-course').modal('hide')
                    this.courseForm.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'Course Added'
                        })
                    this.$Progress.finish();
                })
                .catch((error)=>{
                   this.$Progress.fail();
                   Toast.fire({
                        icon: 'warning',
                        title: 'Ops! Something went wrong.'
                        })
                })
            },
        editCourse(course){
                this.editmode = true;
                this.courseForm.reset();
                $('#modal-course').modal('show');
                this.courseForm.fill(course);
            },
        updateCourse(){
            this.$Progress.start();
            this.courseForm.put('api/course/'+this.courseForm.id)
            .then(() => {
                $('#modal-course').modal('hide');
                    Toast.fire({
                    icon: 'success',
                    title: 'Course Updated!'
                    })
                    this.$Progress.finish();
                        Fire.$emit('AfterUpdateCourse');
                        this.courseForm.reset();
                        this.editmode = false;
            })
            .catch(() => {
                this.$Progress.fail();
            });
        },        

        pageCourse(){
             axios.get('api/course?page=' + page)
                    .then(response => {
                        this.courses = response.data.data;
                    });
        },

        //END COURSE METHODS
            loadSettings(){
                axios.get('api/schoolyear')
                    .then((data) => {
                    this.SYisLoading = false
                    this.school_years = data.data.data
                    
                    })
                    .finally(() => {
                        this.SYisLoading = true
                    });
          
                axios.get('api/semester')
                    .then((data) => {
                        this.SEMisLoading = false
                    this.semesters = data.data.data
                    
                    })
                    .finally(() => {
                        this.SEMisLoading = true
                });

                axios.get('api/department')
                    .then((data) => {
                        this.DEPisLoading = false
                    this.departments = data.data.data
                    
                    })
                    .finally(() => {
                        this.DEPisLoading = true
                });

                axios.get('api/course')
                .then((data) => {
                    this.COisLoading = false
                   this.courses = data.data.data
                   
                })
                .finally(() => {
                    this.COisLoading = true
                });
            },
         }, 
       async created() {

            axios.get("api/getschoolyear").then(({ data }) => (this.get_school_years = data));
            axios.get("api/getdepartment").then(({ data }) => (this.get_departments = data));

            this.loadSettings();
            Fire.$on('AfterCreateSchoolYear',() => {
               axios.get("api/schoolyear").then(({ data }) => (this.school_years = data.data));
            });
            Fire.$on('AfterUpdateSchoolYear',() => {
               axios.get("api/schoolyear").then(({ data }) => (this.school_years = data.data));
            });

            Fire.$on('AfterCreateSemester',() => {
               axios.get("api/semester").then(({ data }) => (this.semesters = data.data));
            });
            Fire.$on('AfterUpdateSemester',() => {
               axios.get("api/semester").then(({ data }) => (this.semesters = data.data));
            });

            Fire.$on('AfterCreateDepartment',() => {
               axios.get("api/department").then(({ data }) => (this.departments = data.data));
            });
            Fire.$on('AfterUpdateDepartment',() => {
               axios.get("api/department").then(({ data }) => (this.departments = data.data));
            });

            Fire.$on('AfterCreateCourse',() => {
               axios.get("api/course").then(({ data }) => (this.courses = data.data));
            });
            Fire.$on('AfterUpdateCourse',() => {
               axios.get("api/course").then(({ data }) => (this.courses = data.data));
            });
           
           
        }
    }

</script>
