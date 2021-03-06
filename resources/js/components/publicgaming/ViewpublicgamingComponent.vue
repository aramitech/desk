<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">View Public Lottery</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
      <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                        <div class="form-group row">
                       <div class="col-md-6">
							<label>Company Name</label>
							<input class="form-control" name="company_name" v-model="fields.company_name" type="text" placeholder="Company Name" required>
                            <div v-if="errors && errors.company_name" class="text-danger">{{ errors.company_name[0] }}</div>
						</div>
                      <div class="col-md-6">
							<label>License No</label>
							<input class="form-control"  name="license_no" v-model="fields.license_no" value="" type="text" placeholder="License No" required>
                            <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
						</div></div>
                        <div class="form-group row">
                        <div class="col-md-6">
							<label>Return For The Period Of</label>
							<input class="form-control"  name="return_for_the_period_of" v-model="fields.return_for_the_period_of" value="" type="date" placeholder="Return For The Period Of" required>
                            <div v-if="errors && errors.return_for_the_period_of" class="text-danger">{{ errors.return_for_the_period_of[0] }}</div>
						</div>
                       <div class="col-md-6">
							<label>Return For The Period To</label>
							<input class="form-control"  name="return_for_the_period_to" v-model="fields.return_for_the_period_to" value="" type="date" placeholder="Return For The Period To" required>
                            <div v-if="errors && errors.return_for_the_period_to" class="text-danger">{{ errors.return_for_the_period_to[0] }}</div>
						</div></div>
            <div class="form-group row">     
                          <div class="col-md-6">
							<label>Date</label>
							<input class="form-control"  name="date" v-model="fields.date" value="" type="date" placeholder="Date" required>
                            <div v-if="errors && errors.date" class="text-danger">{{ errors.date[0] }}</div>
						</div>
                                    
                           <div class="col-md-6">
							<label>Sales</label>
							<input class="form-control"  name="sales" v-model="fields.sales" value="" type="text" placeholder="Sales" required>
                            <div v-if="errors && errors.sales" class="text-danger">{{ errors.sales[0] }}</div>
						</div>
                           </div>
          <div class="form-group row">              
                        <div class="col-md-6">
							<label>Payouts</label>
							<input class="form-control"  name="payouts" v-model="fields.payouts" value="" type="text" placeholder="Payouts" required>
                            <div v-if="errors && errors.payouts" class="text-danger">{{ errors.payouts[0] }}</div>
						</div>
                           <div class="col-md-4">
							<label>WHT</label>
							<input class="form-control"  name="wht" v-model="fields.wht" value="" type="text" placeholder="WHT" required>
                            <div v-if="errors && errors.wht" class="text-danger">{{ errors.wht[0] }}</div>
						</div>          
                           <div class="col-md-4">
							<label>GGR</label>
							<input class="form-control"  name="ggr" v-model="fields.ggr" value="" type="text" placeholder="GGR" required>
                            <div v-if="errors && errors.ggr" class="text-danger">{{ errors.ggr[0] }}</div>
						</div>
                          <div class="col-md-6">
							<label>License No</label>
							<input class="form-control"  name="licensee_name" v-model="fields.licensee_name" value="" type="text" placeholder="License Namme" required>
                            <div v-if="errors && errors.licensee_name" class="text-danger">{{ errors.licensee_name[0] }}</div>
						</div>
                        </div>
                        
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
        action: '/publicgaming/update', //edit action
        text: 'Updated Succesfully',
        redirect: '/publicgaming',

 company_names: [],

        fields: {
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
             
       }
        }
    },

methods: {
    getLicenseeName: function(){
        axios.get('/license_name/get')
        .then(function(response){
          this.company_names = response.data;
         
        }.bind(this));
         console.log(response, 'kkkkk')
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
   }
}
</script>
