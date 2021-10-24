<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form method="POST" @submit.prevent="submit">
            <div class="modal-body">
                <div class="trf">  
       <div class="form-group row">
        	<div class="col-md-6">
                    <label>Name</label>
                    <input class="form-control" name="name" v-model="fields.name" type="text" placeholder="John Doe" required>
                    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                </div>
              <div class="col-md-6">
                    <label>Email</label>
                    <input class="form-control" name="email" v-model="fields.email" value="" type="email" placeholder="me@example.com" required>
                    <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                </div>    </div>
            <div class="form-group row">
        	<div class="col-md-6">
							<label>Personal File No</label>
							<input class="form-control" name="perspnal_file_no" v-model="fields.perspnal_file_no" value="" type="text" placeholder="Personal File No" >
                            <div v-if="errors && errors.perspnal_file_no" class="text-danger">{{ errors.perspnal_file_no[0] }}</div>
						</div>

                <div class="col-md-6">
							<label>Section</label>
							<input class="form-control" name="section" v-model="fields.section" value="" type="text" placeholder="Section" >
                            <div v-if="errors && errors.section" class="text-danger">{{ errors.section[0] }}</div>
						</div>	  </div>

    <div class="form-group row">
        	<div class="col-md-6">
							<label>Department</label>
 <multiselect  name="departments_id" v-model="fields.departments_id"   label="department_name" placeholder="Select Department" :options="department_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>    
                                      <div v-if="errors && errors.departments_id" class="text-danger">{{ errors.departments_id[0] }}</div>
						
                        </div>
                        
                     	<div class="col-md-6">

							<label>User Type</label>
  <multiselect  name="user_types_id" v-model="fields.user_types_id"   label="user_types" placeholder="Select User Types" :options="user_type_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>                            <div v-if="errors && errors.user_types_id" class="text-danger">{{ errors.user_types_id[0] }}</div>
						</div> 
                        
                        </div>






                        		<div class="form-group">
							<label>Phone</label>
							<input class="form-control" name="phone" v-model="fields.phone" value="" type="text" placeholder="0712516957" required>
                            <div v-if="errors && errors.phone" class="text-danger">{{ errors.phone[0] }}</div>
						</div>	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';
import Multiselect from 'vue-multiselect';

// register globally
Vue.component('multiselect', Multiselect)
export default {
  mixins: [ FormMixin ],
     components: { Multiselect },
  props: [ 'userdata' ],
data() {
    return {
            department_names: [],
        user_type_names: [],
        action: '/desk/public/users/update', //edit action
        text: 'Updated Succesfully',
        redirect: '',
        //redirect: '/desk/public/users',
        fields: {
        departments_id:this.userdata.departments_id,
        id:this.userdata.id,
        name:this.userdata.name,
        email:this.userdata.email,
        perspnal_file_no:this.userdata.perspnal_file_no,
                    section:this.userdata.section,
                        phone:this.userdata.phone,
         user_types_id:this.userdata.usertypesusers,
        user_types:this.userdata.user_types_id,
           
        departments_id:this.userdata.departmentsusers,
        department_name:this.userdata.departments_id,
        }
        }   
    },

methods: {
     getdepartment_names: function(){
        axios.get('/desk/public/department_names/get')
        .then(function(response){
          this.department_names = response.data;   
        }.bind(this));
      },
          getuser_type_names: function(){
        axios.get('/desk/public/user_type_names/get')
        .then(function(response){
          this.user_type_names = response.data;   
        }.bind(this));
      },


      
    },

        created: function(){  
   this.getuser_type_names();
     this.getdepartment_names() ; 
    },

    mounted() {
        this.fields.departments_id=this.userdata.departments_id;
        this.fields.id=this.userdata.id;
        this.fields.name=this.userdata.name;
        this.fields.email=this.userdata.email;
        this.fields.perspnal_file_no=this.userdata.perspnal_file_no;
        this.fields.section=this.userdata.section;
        this.fields.phone=this.userdata.phone;

        this.fields.user_types_id=this.userdata.usertypesusers;
        this.fields.user_types=this.userdata.usertypesusers.user_types;

        this.fields.departments_id=this.userdata.departmentsusers;
        this.fields.department_name=this.userdata.departmentsusers.department_name;
    }
}
</script>
