<template>
               <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add Public Lottery Company</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
               <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                    <div class="trf">  
                             <div class="form-group">
                            <div class="form-group row">
					<div class="col-md-6">
							<label>Company Name</label>
							<input class="form-control" name="company_name" v-model="fields.company_name" type="text" placeholder="Company Name" required>
                            <div v-if="errors && errors.company_name" class="text-danger">{{ errors.company_name[0] }}</div>
						</div>
						<div class="col-md-6">
							<label>Trading Name</label>
							<input class="form-control" name="trading_name" v-model="fields.trading_name" value="" type="text" placeholder="Trading Name" required>
                            <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
						</div></div>
      <div class="form-group row">
                        <div class="col-md-6">
							<label>License No</label>
							<input class="form-control"  name="license_no" v-model="fields.license_no" value="" type="text" placeholder="License No" required>
                            <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
						</div>
                        <div class="col-md-6">
							<label>Email</label>
							<input class="form-control"  name="email" v-model="fields.email" value="" type="email" placeholder="Email" required>
                            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
						</div></div>
      <div class="form-group row">
                           <div class="col-md-6"> 
							<label>Contact</label>
							<input class="form-control"  name="contact" v-model="fields.contact" value="" type="text" placeholder="Contact" required>
                            <div v-if="errors && errors.contact" class="text-danger">{{ errors.contact[0] }}</div>
						</div>
                            <div class="col-md-6">
							<label>Physical Location</label>
							<input class="form-control"  name="physicaladdress" v-model="fields.physicaladdress" value="" type="text" placeholder="Physical Address" required>
                            <div v-if="errors && errors.physicaladdress" class="text-danger">{{ errors.physicaladdress[0] }}</div>
						</div></div>



      <div class="form-group row">
                           <div class="col-md-6">
							<label>Directors Shareholders</label>
							<input class="form-control"  name="directorsshareholder" v-model="fields.directorsshareholder" value="" type="text" placeholder="Directors Shareholder" required>
                            <div v-if="errors && errors.directorsshareholder" class="text-danger">{{ errors.directorsshareholder[0] }}</div>
						</div>
                            <div class="col-md-6">
							<label>Shareholding Structure</label>
							<input class="form-control"  name="shareholdingstructure" v-model="fields.shareholdingstructure" value="" type="text" placeholder="Shareholding Structure" required>
                            <div v-if="errors && errors.shareholdingstructure" class="text-danger">{{ errors.shareholdingstructure[0] }}</div>
						</div></div>





      <div class="form-group row">
                           <div class="col-md-6">
							<label>Nationality</label>
							<input class="form-control"  name="nationality" v-model="fields.nationality" value="" type="text" placeholder="Nationality" required>
                            <div v-if="errors && errors.nationality" class="text-danger">{{ errors.nationality[0] }}</div>
						</div>
                            <div class="col-md-6">
							<label>Company Registration</label>
							<input class="form-control"  name="companyregistration" v-model="fields.companyregistration" value="" type="text" placeholder="Company Registration" required>
                            <div v-if="errors && errors.companyregistration" class="text-danger">{{ errors.companyregistration[0] }}</div>
						</div></div>






 <div class="form-group row">
                       <div class="col-md-6">
							<label>PAYBILL NO</label>
							<input class="form-control"  name="paybillno" v-model="fields.paybillno" value="" type="text" placeholder="Paybill No" >
                            <div v-if="errors && errors.paybillno" class="text-danger">{{ errors.paybillno[0] }}</div>
					
						
							<input class="form-control"  name="branch" v-model="fields.branch" value="" type="hidden" placeholder="Branch" >
						</div>
                        
            <div class="col-md-6">
							<label>KRA PIN </label>
							<input class="form-control"  name="krapin" v-model="fields.krapin" value="" type="text" placeholder="KRA PIN" >
                            <div v-if="errors && errors.krapin" class="text-danger">{{ errors.krapin[0] }}</div>
					
						
							<input class="form-control"  name="branch" v-model="fields.branch" value="" type="hidden" placeholder="Branch" >
						</div>                     <!-- <div class="col-md-6">
            <label for="category_type_id"> Category</label>        
          
            <multiselect  name="category_type_id" v-model="fields.category_type_id"   label="categorytype" placeholder="Select Category name" :options="company_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>
            <div v-if="errors && errors.category_type_id" class="text-danger">{{ errors.category_type_id[0] }}</div>
       
        </div>  -->
                        
                        </div>
                     
                    </div> </div>



                

                    <div class="modal-footer">  <div class="trf">  
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>  </div> </div>
                </form>
            </div>

</template>

<script>
import FormMixin from '../shared/FormMixin';

export default {
  mixins: [ FormMixin ],
data() {
    return {
          action: '/desk/public/company/addpubliclottery', //save action
        text: 'Added Succesfully',
        redirect: '',
     //redirect: '/desk/public/company/publiclotteryuser',
        company_names:[],
       fields: {
    
        }
        }
    },

methods: {
      getCategoryTypeName: function(){   
        axios.get('/desk/public/CategoryTypeNam/get')
        .then(function(response){
          this.company_names = response.data;        
        }.bind(this));
      },
    },

         created: function(){  
     this.getCategoryTypeName()   
    },
}
</script>
<!--Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>