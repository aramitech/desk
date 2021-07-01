<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">User Assign Role</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form method="POST" @submit.prevent="submit">
            <div class="modal-body">
               <div class="form-group row">                       
                           <div class="col-md-6">
                  
                    <label>Name</label>
                    <input class="form-control" name="name" v-model="fields.name" type="text" :disabled="validated ? false : true" required>
                    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                </div> 
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control"  name="email" v-model="fields.email" value="" type="email" :disabled="validated ? false : true" placeholder="me@example.com" required>
                    <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                </div></div>

     <div class="form-group row">                       
                           <div class="col-md-6">
                 	<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">   <label>Edit</label>
                   
                 [ Allowed  <input type="radio" name="editstatus" v-model="fields.editstatus" id="editstatus" value="Allowed">
                  Not Allowed  <input type="radio" name="editstatus" v-model="fields.editstatus" id="editstatus" value="NotAllowed">
                 ]
                    <input class="form-control" :disabled="validated ? false : true" name="editstatus" v-model="fields.editstatus" type="text"    >
                    <div v-if="errors && errors.editstatus" class="text-danger">{{ errors.editstatus[0] }}</div>
                </div></div></div>
                

          <div class="col-md-6">
              	<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p"> 
                    <label>Delete</label>
      [ Allowed  <input type="radio" name="deletestatus" v-model="fields.deletestatus" id="deletestatus" value="Allowed">
                  Not Allowed  <input type="radio" name="deletestatus" v-model="fields.deletestatus" id="deletestatus" value="NotAllowed">
                 ]                    <input class="form-control" :disabled="validated ? false : true" name="deletestatus" v-model="fields.deletestatus" type="text"    >
                    <div v-if="errors && errors.deletestatus" class="text-danger">{{ errors.deletestatus[0] }}</div>
                    </div>  </div> </div> </div>


  <div class="form-group row">                       
                           <div class="col-md-6">
                               	<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p"> 
                    <label>Bookmarkers</label>
      [ Allowed  <input type="radio" name="bookmarkersstatus" v-model="fields.bookmarkersstatus" id="bookmarkersstatus" value="Allowed">
                  Not Allowed  <input type="radio" name="bookmarkersstatus" v-model="fields.bookmarkersstatus" id="bookmarkersstatus" value="NotAllowed">
                 ]                    <input class="form-control" :disabled="validated ? false : true" name="bookmarkersstatus" v-model="fields.bookmarkersstatus" type="text"    >
                    <div v-if="errors && errors.bookmarkersstatus" class="text-danger">{{ errors.bookmarkersstatus[0] }}</div>
                    </div> </div> </div>

     <div class="col-md-6">
         	<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p"> 
                    <label>Public Lottery </label>
      [ Allowed  <input type="radio" name="publiclotterystatus" v-model="fields.publiclotterystatus" id="publiclotterystatus" value="Allowed">
                  Not Allowed  <input type="radio" name="publiclotterystatus" v-model="fields.publiclotterystatus" id="publiclotterystatus" value="NotAllowed">
                 ]                    <input class="form-control" :disabled="validated ? false : true" name="publiclotterystatus" v-model="fields.publiclotterystatus" type="text"    >
                    <div v-if="errors && errors.publiclotterystatus" class="text-danger">{{ errors.publiclotterystatus[0] }}</div>
                    </div> </div> </div>

     <div class="col-md-6">
         	<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p"> 
                    <label>companies_status</label>
      [ Allowed  <input type="radio" name="companies_status" v-model="fields.companies_status" id="companies_status" value="Allowed">
                  Not Allowed  <input type="radio" name="companies_status" v-model="fields.companies_status" id="companies_status" value="NotAllowed">
                 ]                    <input class="form-control" :disabled="validated ? false : true" name="companies_status" v-model="fields.companies_status" type="text"    >
                    <div v-if="errors && errors.companies_status" class="text-danger">{{ errors.companies_status[0] }}</div>
                    </div>  </div> </div>
                     
                           <div class="col-md-6">
                               	<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p"> 
                    <label>Public Gaming</label>
      [ Allowed  <input type="radio" name="publicgamingstatus" v-model="fields.publicgamingstatus" id="publicgamingstatus" value="Allowed">
                  Not Allowed  <input type="radio" name="publicgamingstatus" v-model="fields.publicgamingstatus" id="publicgamingstatus" value="NotAllowed">
                 ]                   <input class="form-control" :disabled="validated ? false : true" name="publicgamingstatus" v-model="fields.publicgamingstatus" type="text"    >
                    <div v-if="errors && errors.publicgamingstatus" class="text-danger">{{ errors.publicgamingstatus[0] }}</div>
                    </div> </div></div> </div> </div>

                

  <div class="form-group row">                       
                           <div class="col-md-6">
                               	<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p"> 
                    <label><strong>Send SMS</strong></label>
      [ Allowed  <input type="radio" name="sendsms_status" v-model="fields.sendsms_status" id="sendsms_status" value="Allowed">
                  Not Allowed  <input type="radio" name="sendsms_status" v-model="fields.sendsms_status" id="sendsms_status" value="NotAllowed">
                 ]                    <input class="form-control" :disabled="validated ? false : true" name="sendsms_status" v-model="fields.sendsms_status" type="text"    >
                    <div v-if="errors && errors.sendsms_status" class="text-danger">{{ errors.sendsms_status[0] }}</div>
                    </div> </div> </div>


          <div class="col-md-6">
              	<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p"> 
                    <label>Bookmarkers Shop</label>
      [ Allowed  <input type="radio" name="bookmarkersshop_status" v-model="fields.bookmarkersshop_status" id="bookmarkersshop_status" value="Allowed">
                  Not Allowed  <input type="radio" name="bookmarkersshop_status" v-model="fields.bookmarkersshop_status" id="bookmarkersshop_status" value="NotAllowed">
                 ]                   <input class="form-control" :disabled="validated ? false : true" name="bookmarkersshop_status" v-model="fields.bookmarkersshop_status" type="text"    >
                    <div v-if="errors && errors.bookmarkersshop_status" class="text-danger">{{ errors.bookmarkersshop_status[0] }}</div>
                    </div> </div> </div> </div>
     
     
    
  

  <div class="form-group row">                       
                           <div class="col-md-6">
                               	<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p"> 
                    <label><strong>Accounts</strong></label>
      [ Allowed  <input type="radio" name="user_accounts_status" v-model="fields.user_accounts_status" id="user_accounts_status" value="Allowed">
                  Not Allowed  <input type="radio" name="user_accounts_status" v-model="fields.user_accounts_status" id="user_accounts_status" value="NotAllowed">
                 ]                    <input class="form-control" :disabled="validated ? false : true" name="user_accounts_status" v-model="fields.user_accounts_status" type="text"    >
                    <div v-if="errors && errors.user_accounts_status" class="text-danger">{{ errors.user_accounts_status[0] }}</div>
                    </div> </div> </div>


 <div class="col-md-6">
                               	<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p"> 
                    <label><strong>Bookmarkers Records</strong></label>
      [ Allowed  <input type="radio" name="records_bookmarkers" v-model="fields.records_bookmarkers" id="records_bookmarkers" value="Allowed">
                  Not Allowed  <input type="radio" name="records_bookmarkers" v-model="fields.records_bookmarkers" id="records_bookmarkers" value="NotAllowed">
                 ]                    <input class="form-control" :disabled="validated ? false : true" name="records_bookmarkers" v-model="fields.records_bookmarkers" type="text"    >
                    <div v-if="errors && errors.records_bookmarkers" class="text-danger">{{ errors.records_bookmarkers[0] }}</div>
                    </div> </div> </div>

          </div>


<div class="form-group row">                       
                           <div class="col-md-6">
                               	<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p"> 
                    <label><strong>Public Lottery Records</strong></label>
      [ Allowed  <input type="radio" name="records_public_lotery" v-model="fields.records_public_lotery" id="records_public_lotery" value="Allowed">
                  Not Allowed  <input type="radio" name="records_public_lotery" v-model="fields.records_public_lotery" id="records_public_lotery" value="NotAllowed">
                 ]                    <input class="form-control" :disabled="validated ? false : true" name="records_public_lotery" v-model="fields.records_public_lotery" type="text"    >
                    <div v-if="errors && errors.records_public_lotery" class="text-danger">{{ errors.records_public_lotery[0] }}</div>
                    </div> </div> </div>


 <div class="col-md-6">
                               	<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p"> 
                    <label><strong>Public Gaming Records</strong></label>
      [ Allowed  <input type="radio" name="records_public_gaming" v-model="fields.records_public_gaming" id="records_public_gaming" value="Allowed">
                  Not Allowed  <input type="radio" name="records_public_gaming" v-model="fields.records_public_gaming" id="records_public_gaming" value="NotAllowed">
                 ]                    <input class="form-control" :disabled="validated ? false : true" name="records_public_gaming" v-model="fields.records_public_gaming" type="text"    >
                    <div v-if="errors && errors.records_public_gaming" class="text-danger">{{ errors.records_public_gaming[0] }}</div>
                    </div> </div> </div>

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
        action: '/desk/public/users/updaterole', //edit action
        text: 'Updated Succesfully',
        redirect: '/desk/public/users',
        fields: {
            id:this.userdata.id,  
            name:this.userdata.name,
            email:this.userdata.email,
            editstatus:this.userdata.editstatus,
            bookmarkersstatus:this.userdata.bookmarkersstatus,
             deletestatus:this.userdata.deletestatus,
              publiclotterystatus:this.userdata.publiclotterystatus,
               publicgamingstatus:this.userdata.publicgamingstatus,
               sendsms_status:this.userdata.sendsms_status,
               bookmarkersshop_status:this.userdata.bookmarkersshop_status,
               companies_status:this.userdata.companies_status,
               user_accounts_status:this.userdata.user_accounts_status,
              //  deletestatus:this.userdata.deletestatus,
               records_bookmarkers:this.userdata.records_bookmarkers,
               records_public_lotery:this.userdata.records_public_lotery,
               records_public_gaming:this.userdata.records_public_gaming,

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
        this.fields.deletestatus=this.userdata.deletestatus;
        this.fields.bookmarkersstatus=this.userdata.bookmarkersstatus;
        this.fields.publiclotterystatus=this.userdata.publiclotterystatus;
        this.fields.publicgamingstatus=this.userdata.publicgamingstatus;
        this.fields.sendsms_status=this.userdata.sendsms_status;
        this.fields.bookmarkersshop_status=this.userdata.bookmarkersshop_status;
        this.fields.companies_status=this.userdata.companies_status;
        this.fields.user_accounts_status=this.userdata.user_accounts_status;
               this.fields.records_bookmarkers=this.userdata.records_bookmarkers;
        this.fields.records_public_lotery=this.userdata.records_public_lotery;
        this.fields.records_public_gaming=this.userdata.records_public_gaming;

    }
}
</script>
