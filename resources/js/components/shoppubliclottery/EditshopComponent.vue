<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Edit Public Lottery Shop</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
                  <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                          <div class="form-group row">
 <div class="col-md-6">
            <label for="company_id"> Licensee Name</label>        
            <multiselect  name="company_id" v-model="fields.company_id"   label="company_name" placeholder="Select License name" :options="company_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>
            <div v-if="errors && errors.company_id" class="text-danger">{{ errors.company_id[0] }}</div>
       
        </div> 
           <div class="col-md-6">
							<!-- <label>Licensee Name</label> -->
							<input class="form-control" name="licensee_name" v-model="fields.licensee_name" type="hidden" placeholder="Licensee Name" required>
                            <div v-if="errors && errors.licensee_name" class="text-danger">{{ errors.licensee_name[0] }}</div>
						</div>
        
         </div>


  <div class="form-group row">
					<div class="col-md-6">
							<label>Trading Name</label>   
							<input class="form-control" name="trading_name" v-model="fields.trading_name" value="" type="text" placeholder="Trading Name" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
						</div>
                      <div class="col-md-6">
							<label>License No</label>
							<input class="form-control"  name="license_no" v-model="fields.license_no" value="" type="text" placeholder="License No" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
						</div></div>

<div class="form-group row">   

                            <div class="col-md-6">
							<label>shop Name</label>
							<input class="form-control"  name="shop_name" v-model="fields.shop_name" value="" type="text" placeholder="Shop Name" required>
                            <div v-if="errors && errors.shop_name" class="text-danger">{{ errors.shop_name[0] }}</div>
						</div>
                        
  
                          <div class="col-md-6">
							<label>Location</label>
							<input class="form-control"  name="location" v-model="fields.location" value="" type="text" placeholder="Location" >
                            <div v-if="errors && errors.location" class="text-danger">{{ errors.location[0] }}</div>
						</div></div>

 
                        
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
  props: [ 'shopdata' ],
data() {
    return {
        action: '/desk/public/shop/update', //edit action
        text: 'Updated Succesfully',
        redirect: '/desk/public/',

 company_names: [],

        fields: {
          
            shop_id:this.shopdata.shop_id,
            company_id:this.shopdata.company_id,
            shop_name:this.shopdata.shop_name,    
             location:this.shopdata.location, 
             Shopcompany:this.shopdata.company_name, 
       }
        }
    },

methods: {
    getLicenseeName: function(){
          axios.get('/desk/public/publicgaming_license_name/get')
        .then(function(response){
          this.company_names = response.data;
         
        }.bind(this));
         console.log(response, 'kkkkk')
      },


   
 onChange (value) {
      this.value = value
    this.fields.license_no=this.value.license_no;
       this.fields.trading_name=this.value.trading_name;
     this.fields.licensee_name=this.value.company_name
    console.log(value)
    },
    },
        created: function(){  
     this.getLicenseeName()   
    },
    mounted() {
        this.fields.shop_id=this.shopdata.shop_id;
        this.fields.company_id=this.shopdata.company_id;
       this.fields.shop_name=this.shopdata.shop_name;
         this.fields.location=this.shopdata.location;    
         this.fields.trading_name=this.shopdata.Shopcompany.trading_name;       
   }
}
</script>
  