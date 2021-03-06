<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">User Assign Role</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form method="POST" @submit.prevent="submit">
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" v-model="fields.name" type="text" :disabled="validated ? false : true" required>
                    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" v-model="fields.email" value="" type="email" :disabled="validated ? false : true" placeholder="me@example.com" required>
                    <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                </div>

     <div class="form-group row">                       
                           <div class="col-md-6">
                    <label>Edit</label>
                   
                 ((( Allowed  <input type="radio" name="editstatus" v-model="fields.editstatus" id="editstatus" value="Allowed">
                  Not Allowed  <input type="radio" name="editstatus" v-model="fields.editstatus" id="editstatus" value="NotAllowed">
                 )))
                    <input class="form-control" name="editstatus" v-model="fields.editstatus" type="text"    >
                    <div v-if="errors && errors.editstatus" class="text-danger">{{ errors.editstatus[0] }}</div>
                </div>
                

          <div class="col-md-6">
                    <label>Delete</label>
      ((( Allowed  <input type="radio" name="deletestatus" v-model="fields.deletestatus" id="deletestatus" value="Allowed">
                  Not Allowed  <input type="radio" name="deletestatus" v-model="fields.deletestatus" id="deletestatus" value="NotAllowed">
                 )))                    <input class="form-control" name="deletestatus" v-model="fields.deletestatus" type="text"    >
                    <div v-if="errors && errors.deletestatus" class="text-danger">{{ errors.deletestatus[0] }}</div>
                    </div>  </div>


  <div class="form-group row">                       
                           <div class="col-md-6">
                    <label>Bookmarkers</label>
      ((( Allowed  <input type="radio" name="bookmarkersstatus" v-model="fields.bookmarkersstatus" id="bookmarkersstatus" value="Allowed">
                  Not Allowed  <input type="radio" name="bookmarkersstatus" v-model="fields.bookmarkers" id="bookmarkersstatus" value="NotAllowed">
                 )))                    <input class="form-control" name="bookmarkersstatus" v-model="fields.bookmarkersstatus" type="text"    >
                    <div v-if="errors && errors.bookmarkersstatus" class="text-danger">{{ errors.bookmarkersstatus[0] }}</div>
                    </div>

     <div class="col-md-6">
                    <label>Public Lottery </label>
      ((( Allowed  <input type="radio" name="publiclotterystatus" v-model="fields.publiclotterystatus" id="publiclotterystatus" value="Allowed">
                  Not Allowed  <input type="radio" name="publiclotterystatus" v-model="fields.publiclotterystatus" id="publiclotterystatus" value="NotAllowed">
                 )))                    <input class="form-control" name="publiclotterystatus" v-model="fields.publiclotterystatus" type="text"    >
                    <div v-if="errors && errors.publiclotterystatus" class="text-danger">{{ errors.publiclotterystatus[0] }}</div>
                    </div>


                     
                           <div class="col-md-6">
                    <label>Public Gaming</label>
      ((( Allowed  <input type="radio" name="publicgamingstatus" v-model="fields.publicgamingstatus" id="publicgamingstatus" value="Allowed">
                  Not Allowed  <input type="radio" name="publicgamingstatus" v-model="fields.publicgamingstatus" id="publicgamingstatus" value="NotAllowed">
                 )))                    <input class="form-control" name="publicgamingstatus" v-model="fields.publicgamingstatus" type="text"    >
                    <div v-if="errors && errors.publicgamingstatus" class="text-danger">{{ errors.publicgamingstatus[0] }}</div>
                    </div> </div>

                
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

export default {
  mixins: [ FormMixin ],
  props: [ 'userdata' ],
data() {
    return {
        action: '/users/updaterole', //edit action
        text: 'Updated Succesfully',
        redirect: '/users',
        fields: {
            id:this.userdata.id,  
            name:this.userdata.name,
            email:this.userdata.email,
            editstatus:this.userdata.editstatus,
            deletestatus:this.userdata.deletestatus,
        }
        }
    },

methods: {

    },
    mounted() {
        this.fields.id=this.userdata.id;
        this.fields.name=this.userdata.name;
        this.fields.email=this.userdata.email;
        this.fields.editstatus=this.userdata.editstatus;
        vthis.fields.deletestatus=this.userdata.deletestatus;
    }
}
</script>
