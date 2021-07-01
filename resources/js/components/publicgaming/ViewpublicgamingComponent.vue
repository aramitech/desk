<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Edit Public Lottery</h4>
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
							<label>License No</label>
							<input class="form-control"  name="license_no" v-model="fields.license_no" value="" type="text" placeholder="License No" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
						</div>
                        
                              <div class="col-md-6">
							<label>Trading As</label>
							<input class="form-control"  name="trading_name" v-model="fields.trading_name" value="" type="text" placeholder="Trading As" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
						</div>
                        
                        </div>
                        <div class="form-group row">
                        <div class="col-md-6">
							<label>Return For The Period Of</label>
							<input class="form-control"  name="return_for_the_period_of" v-model="fields.return_for_the_period_of" value="" type="date" placeholder="Return For The Period Of" >
                            <div v-if="errors && errors.return_for_the_period_of" class="text-danger">{{ errors.return_for_the_period_of[0] }}</div>
						</div>
                       <div class="col-md-6">
							<label>Return For The Period To</label>
							<input class="form-control"  name="return_for_the_period_to" v-model="fields.return_for_the_period_to" value="" type="date" placeholder="Return For The Period To" >
                            <div v-if="errors && errors.return_for_the_period_to" class="text-danger">{{ errors.return_for_the_period_to[0] }}</div>
						</div></div>
            <div class="form-group row">     
                          <div class="col-md-4">
							<label>Date</label>
							<input class="form-control"  name="date" v-model="fields.date" value="" type="date" placeholder="Date" required>
                            <div v-if="errors && errors.date" class="text-danger">{{ errors.date[0] }}</div>
						</div>
                                    
                           <div class="col-md-4">
							<label>Sales</label>
							<input class="form-control" @keyup="sum"  name="sales" v-model="fields.sales" value="" type="text" placeholder="Sales" required>
                            <div v-if="errors && errors.sales" class="text-danger">{{ errors.sales[0] }}</div>
						</div>
                         <div class="col-md-4">
							<label>Payouts</label>
							<input class="form-control" @keyup="sum" name="payouts" v-model="fields.payouts" value="" type="text" placeholder="Payouts" required>
                            <div v-if="errors && errors.payouts" class="text-danger">{{ errors.payouts[0] }}</div>
						</div>
                           </div>
          <div class="form-group row">              
                       
                           <div class="col-md-4">
							<label>WHT</label>
							<input class="form-control" :disabled="validated ? false : true" name="wht" v-model="fields.wht" value="" type="text" placeholder="WHT" required>
                            <div v-if="errors && errors.wht" class="text-danger">{{ errors.wht[0] }}</div>
						</div>          
                           <div class="col-md-4">
							<label>GGR</label>
							<input class="form-control" :disabled="validated ? false : true" name="ggr" v-model="fields.ggr" value="" type="text" placeholder="GGR" required>
                            <div v-if="errors && errors.ggr" class="text-danger">{{ errors.ggr[0] }}</div>
						</div>
                         <div class="col-md-4">
							<label>GGR TAX</label>
							<input class="form-control" :disabled="validated ? false : true" name="ggrtax" v-model="fields.ggrtax" value="" type="text"  placeholder="GGR TAX" required>
                            <div v-if="errors && errors.ggrtax" class="text-danger">{{ errors.ggrtax[0] }}</div>
						</div>
                        </div>
                        






 
                         
          <div class="form-group row">  

 <div class="col-md-4">
							<label>Sales Slot</label>
							<input class="form-control" @keyup="sum"  name="salesslot" v-model="fields.salesslot" value="" type="text" placeholder="Sales slot" required>
                            <div v-if="errors && errors.salesslot" class="text-danger">{{ errors.salesslot[0] }}</div>
						</div>


                        <div class="col-md-4">
							<label>Payouts Slot</label>
							<input class="form-control" @keyup="sum" name="payoutsslot" v-model="fields.payoutsslot" value="" type="text" placeholder="Payouts slot" required>
                            <div v-if="errors && errors.payoutsslot" class="text-danger">{{ errors.payoutsslot[0] }}</div>
						</div>
                           <div class="col-md-4">
							<label>WHT Slot</label>
							<input class="form-control" :disabled="validated ? false : true" name="whtslot" v-model="fields.whtslot" value="" type="text" placeholder="WHT Slot" required>
                            <div v-if="errors && errors.whtslot" class="text-danger">{{ errors.whtslot[0] }}</div>
						</div>          
                           <div class="col-md-4">
							<label>GGR Slot</label>
							<input class="form-control" :disabled="validated ? false : true" name="ggrslot" v-model="fields.ggrslot" value="" type="text" placeholder="GGR slot" required>
                            <div v-if="errors && errors.ggrslot" class="text-danger">{{ errors.ggrslot[0] }}</div>
						</div>
                         <div class="col-md-4">
							<label>GGR TAX Slot</label>
							<input class="form-control" :disabled="validated ? false : true" name="ggrtaxslot" v-model="fields.ggrtaxslot" value="" type="text"  placeholder="GGR TAX slot" required>
                            <div v-if="errors && errors.ggrtaxslot" class="text-danger">{{ errors.ggrtaxslot[0] }}</div>
						</div>
                        </div>  









                    </div>
                    <div class="modal-footer">
                    
                    </div>
                </form>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

export default {
  mixins: [ FormMixin ],
  props: [ 'publicgamingerdata' ],
data() {
    return {
        action: '/desk/public/publicgaming/update', //edit action
        text: 'Updated Succesfully',
        redirect: '/desk/public/publicgaming',

 company_names: [],

        fields: {
                        license_no:"",
        trading_name:'',
        licensee_name:'',
            publicgaming_id:this.publicgamingerdata.publicgaming_id,
            licensee_name:this.publicgamingerdata.licensee_name,
            license_no:this.publicgamingerdata.license_no,
        return_for_the_period_of:this.publicgamingerdata.return_for_the_period_of,
         return_for_the_period_to:this.publicgamingerdata.return_for_the_period_to,
          date:this.publicgamingerdata.date,
           sales:this.publicgamingerdata.sales,
            payouts:this.publicgamingerdata.payouts,
             deposits:this.publicgamingerdata.deposits,
              total_sales:this.publicgamingerdata.total_sales,
               payouts:this.publicgamingerdata.payouts,
                ggr:this.publicgamingerdata.ggr,
                 wht:this.publicgamingerdata.wht,
                   ggrtax:this.publicgamingerdata.ggrtax,
                   
     salesslot:this.publicgamingerdata.salesslot,
                          payoutsslot:this.publicgamingerdata.payoutsslot,
                ggrslot:this.publicgamingerdata.ggrslot,
                 whtslot:this.publicgamingerdata.whtslot,
                   ggrtaxslot:this.publicgamingerdata.ggrtaxslot,
             
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
             sum()
   {
     //  console.log("a" +this.fields.ggr +  " b " +this.fields.total_payout);
  this.fields.ggr=this.fields.sales - this.fields.total_payout;
  this.fields.wht=0.2 * this.fields.total_payout;
  this.fields.ggrtax=0.15 * this.fields.ggr;  
   
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
        this.fields.publicgaming_id=this.publicgamingerdata.publicgaming_id;
        this.fields.licensee_name=this.publicgamingerdata.licensee_name;
        this.fields.license_no=this.publicgamingerdata.license_no;
        this.fields.licensee_name=this.publicgamingerdata.licensee_name;
         this.fields.return_for_the_period_of=this.publicgamingerdata.return_for_the_period_of;
          this.fields.return_for_the_period_to=this.publicgamingerdata.return_for_the_period_to;
           this.fields.date=this.publicgamingerdata.date;
            this.fields.sales=this.publicgamingerdata.sales;
             this.fields.payouts=this.publicgamingerdata.payouts;
              this.fields.total_sales=this.publicgamingerdata.total_sales;
               this.fields.payouts=this.publicgamingerdata.payouts;
                this.fields.wht=this.publicgamingerdata.wht;
                 this.fields.ggr=this.publicgamingerdata.ggr;
                 this.fields.wht=this.publicgamingerdata.wht;
                  this.fields.ggrtax=this.publicgamingerdata.ggrtax;
   this.fields.salesslot=this.publicgamingerdata.salesslot;
     this.fields.payoutsslot=this.publicgamingerdata.payoutsslot;
                this.fields.whtslot=this.publicgamingerdata.whtslot;
                 this.fields.ggrslot=this.publicgamingerdata.ggrslot;
                 this.fields.whtslot=this.publicgamingerdata.whtslot;
                  this.fields.ggrtaxslot=this.publicgamingerdata.ggrtaxslot;
                  
   }
}
</script>
  