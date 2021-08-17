<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Edit  Finance Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
      <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                   <div class="trf">        <div class="form-group row"> 
 <div class="col-md-6">
            <label for="company_id"> Licensee Name</label>        
            <multiselect  name="company_id" v-model="fields.company_id"   label="company_name" placeholder="Select License name" :options="company_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>
            <div v-if="errors && errors.company_id" class="text-danger">{{ errors.company_id[0] }}</div>
       
        </div> 
           <div class="col-md-6">

   	<label>Trading Name</label>   
							<input class="form-control"  name="trading_name" v-model="fields.trading_name" value="" type="text" placeholder="Trading Name" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
			
            <div v-if="errors && errors.shop_id" class="text-danger">{{ errors.shop_id[0] }}</div>
         
							<!-- <label>Licensee Name</label> -->
							<input class="form-control" name="licensee_name" v-model="fields.licensee_name" type="hidden" placeholder="Licensee Name" required>
                            <div v-if="errors && errors.licensee_name" class="text-danger">{{ errors.licensee_name[0] }}</div>
						</div>
        
         </div>


  <div class="form-group row">
					<div class="col-md-6">
									</div>
                      <div class="col-md-6">
							<label>License No</label>
							<input class="form-control"  name="license_no" v-model="fields.license_no" value="" type="text" placeholder="License No" :disabled="validated ? false : true" >
                            <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
						</div></div></div>
                        <div class="trf">  
    <div class="form-group row">                      
                               <div class="col-md-4">
							<label>MR No</label>
							<input class="form-control"  name="mrno" v-model="fields.mrno" value="" type="text" placeholder="MR No">
                            <div v-if="errors && errors.mrno" class="text-danger">{{ errors.mrno[0] }}</div>
						</div>
                       <div class="col-md-4">
							<label>Application Fee</label>
							<input class="form-control" @keydown="sum" name="application_fee" v-model="fields.application_fee" value="" type="text" placeholder="Application Fee">
                            <div v-if="errors && errors.application_fee" class="text-danger">{{ errors.application_fee[0] }}</div>
						</div>
                        
                                <div class="col-md-4">
							<label>Transfer Fee</label>
							<input class="form-control" @keydown="sum" name="transfer_fee" v-model="fields.transfer_fee" value="" type="text" placeholder="Transfer Fee" >
                            <div v-if="errors && errors.transfer_fee" class="text-danger">{{ errors.transfer_fee[0] }}</div>
						</div>	</div>
                        </div>
       <div class="trf"> 
<div class="form-group row">  
      <div class="col-md-3">
									<label>Annual License Fee</label>
							<input class="form-control" @keydown="sum" name="annual_license_fee" v-model="fields.annual_license_fee" value="" type="text" placeholder="annual_license_fee" >
                            <div v-if="errors && errors.annual_license_fee" class="text-danger">{{ errors.annual_license_fee[0] }}</div>
						</div>
                           <div class="col-md-3">
							<label>Investigation Fee Local</label>
							<input class="form-control" @keydown="sum" name="investigation_fee_local" v-model="fields.investigation_fee_local" value="" type="text" placeholder="investigation_fee_local" >
                            <div v-if="errors && errors.investigation_fee_local" class="text-danger">{{ errors.investigation_fee_local[0] }}</div>
						</div>
                     
                            <div class="col-md-3">
							<label>Investigation Fee Foreign</label>
							<input class="form-control" @keyup="sum" name="investigation_fee_foreign" v-model="fields.investigation_fee_foreign" value="" type="text" placeholder="investigation_fee_foreign" >
                            <div v-if="errors && errors.investigation_fee_foreign" class="text-danger">{{ errors.investigation_fee_foreign[0] }}</div>
						</div>
                            <div class="col-md-3">
							<label>Premise Fee</label>
							<input class="form-control" @keyup="sum" id="premise_fee" name="premise_fee" v-model="fields.premise_fee" value="" type="text" placeholder="Total Payout" >
                            <div v-if="errors && errors.premise_fee" class="text-danger">{{ errors.premise_fee[0] }}</div>
						</div></div>
  <div class="form-group row">                       
                         <div class="col-md-4">
							<label>Renewal Fee</label>
							<input class="form-control" @keydown="sum" name="renewal_fee" v-model="fields.renewal_fee" value="" type="text" placeholder="renewal_fee"  >
                            <div v-if="errors && errors.renewal_fee" class="text-danger">{{ errors.renewal_fee[0] }}</div>
						</div>
                        <div class="col-md-4">
							<label>Operating Fee</label>
                           
                           	<input class="form-control" @keydown="sum" name="operating_fee" v-model="fields.operating_fee" value="" type="text" placeholder="operating_fee" >
                            <div v-if="errors && errors.operating_fee" class="text-danger">{{ errors.operating_fee[0] }}</div>
						</div>
                           <!-- <div class="col-md-4">
							<label>total</label>
							<input class="form-control" id="totals" name="totals" v-model="fields.totals" value="total" type="text" placeholder="total" required>
                            <div v-if="errors && errors.totals" class="text-danger">{{ errors.totals[0] }}</div>
						</div> -->
						</div></div>
                        
                    </div>
                   
                </form>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

export default {
  mixins: [ FormMixin ],
  props: [ 'bookmarkerdata' ],
data() {
    return {
        action: '/desk/public/company/updateBookmarkersCompany', //edit action
        text: 'Updated Succesfully',
        redirect: '/desk/public/company/bookmarkers',
         company_names:[],
         premise_fee_names:[],
         shop_names: [],

        fields: {
       license_no:"",
        trading_name:'',
        licensee_name:'',
                totals : '',
                total_payout: '', 

            company_id:this.bookmarkerdata.company_id,
            category_type_id:this.bookmarkerdata.company_category_type,
            company_id:this.bookmarkerdata.accountscompany,

           company_name:this.bookmarkerdata.category_type_id,
            trading_name:this.bookmarkerdata.trading_name,
            license_no:this.bookmarkerdata.license_no,
            mrno:this.bookmarkerdata.mrno,
            application_fee:this.bookmarkerdata.application_fee,
            transfer_fee:this.bookmarkerdata.transfer_fee,
            annual_license_fee:this.bookmarkerdata.annual_license_fee,
            investigation_fee_local:this.bookmarkerdata.investigation_fee_local,
            investigation_fee_foreign:this.bookmarkerdata.investigation_fee_foreign,
           premise_fee:this.bookmarkerdata.premise_fee,
            categorytype:this.bookmarkerdata.categorytype,
              renewal_fee:this.bookmarkerdata.renewal_fee,
              operating_fee:this.bookmarkerdata.operating_fee,
        }
        }
    },

methods: {

 getLicenseeName: function(){
        axios.get('/desk/public/license_name/get')
        .then(function(response){
          this.company_names = response.data;   
        }.bind(this));
      },
  
   sum()
   {
//   this.fields.totals=parseInt(this.fields.application_fee) + parseInt(this.fields.transfer_fee) + parseInt(this.fields.annual_license_fee) + parseInt(this.fields.investigation_fee_local) + parseInt(this.fields.investigation_fee_foreign) + parseInt(this.fields.premise_fee) + parseInt(this.fields.renewal_fee) + parseInt(this.fields. operating_fee);
 
   
   },
 
 onChange (value) {
      this.value = value;
    this.fields.license_no=this.value.license_no;
       this.fields.trading_name=this.value.trading_name;
     this.fields.licensee_name=this.value.company_name;
     this.fields.shop_id = value.shopcompany;
    console.log(value)
    },


      getCategoryTypeName: function(){   
        axios.get('/desk/public/CategoryTypeNam/get')
        .then(function(response){
          this.company_names = response.data;        
        }.bind(this));
      },
       getpremise_feeType: function(){   
        axios.get('/desk/public/premise_feeTypeNam/get')
        .then(function(response){
          this.company_names = response.data;        
        }.bind(this));
      },
    },
    mounted() {
        this.fields.company_id=this.bookmarkerdata.company_id;
        this.fields.category_type_id=this.bookmarkerdata.company_category_type;
        this.fields.company_id=this.bookmarkerdata.accountscompany;
        
        this.fields.company_name=this.bookmarkerdata.company_name;
        this.fields.trading_name=this.bookmarkerdata.trading_name;
        this.fields.license_no=this.bookmarkerdata.license_no;
        this.fields.mrno=this.bookmarkerdata.mrno;
        this.fields.application_fee=this.bookmarkerdata.application_fee;
        this.fields.transfer_fee=this.bookmarkerdata.transfer_fee;
        this.fields.annual_license_fee=this.bookmarkerdata.annual_license_fee;
        this.fields.investigation_fee_local=this.bookmarkerdata.investigation_fee_local;
       this.fields.investigation_fee_foreign=this.bookmarkerdata.investigation_fee_foreign;     
       this.fields.premise_fee=this.bookmarkerdata.premise_fee;
        this.fields.categorytype=this.bookmarkerdata.categorytype;
        this.fields.renewal_fee=this.bookmarkerdata.renewal_fee;

        this.fields.operating_fee=this.bookmarkerdata.operating_fee;

       
       console.log(this.fields.category_type_id);




    },
          created: function(){  
     this.getCategoryTypeName() 
          this.getLicenseeName() ; 
    },
}
</script>
