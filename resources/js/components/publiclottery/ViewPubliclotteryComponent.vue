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
							<input class="form-control"  name="return_for_of" v-model="fields.return_for_of" value="" type="date" placeholder="Return For The Period Of" >
                            <div v-if="errors && errors.return_for_of" class="text-danger">{{ errors.return_for_of[0] }}</div>
						</div>
                       <div class="col-md-6">
							<label>Return For The Period To</label>
							<input class="form-control"  name="return_to" v-model="fields.return_to" value="" type="date" placeholder="Return For The Period To" >
                            <div v-if="errors && errors.return_to" class="text-danger">{{ errors.return_to[0] }}</div>
						</div></div>
                       <div class="form-group row">
                          <div class="col-md-6">
							<label>Date</label>
							<input class="form-control"  name="date" v-model="fields.date" value="" type="date" placeholder="Date" required>
                            <div v-if="errors && errors.date" class="text-danger">{{ errors.date[0] }}</div>
						</div>
                          <div class="col-md-6">
							<label>Total Tickets Sold</label>
							<input class="form-control"  name="total_tickets_sold" v-model="fields.total_tickets_sold" value="" type="text" placeholder="Total Tickets Sold" required>
                            <div v-if="errors && errors.total_tickets_sold" class="text-danger">{{ errors.total_tickets_sold[0] }}</div>
						</div></div>    
                          <div class="form-group row">
                           <div class="col-md-6">
							<label>Sales</label>
							<input class="form-control"  name="sales" v-model="fields.sales" value="" type="text" placeholder="Sales" required>
                            <div v-if="errors && errors.sales" class="text-danger">{{ errors.sales[0] }}</div>
						</div>
                            <div class="col-md-6">
							<label>Payouts</label>
							<input class="form-control"  name="payouts" v-model="fields.payouts" value="" type="text" placeholder="Payouts" required>
                            <div v-if="errors && errors.payouts" class="text-danger">{{ errors.payouts[0] }}</div>
						</div></div>
                              <div class="form-group row">
                            <div class="col-md-4">
							<label>Total Payout</label>
							<input class="form-control"  name="total_payout" v-model="fields.total_payout" value="" type="text" placeholder="Total Payout" required>
                            <div v-if="errors && errors.total_payout" class="text-danger">{{ errors.total_payout[0] }}</div>
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
						</div></div>
                        
                    </div>
                 
                </form>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

export default {
  mixins: [ FormMixin ],
  props: [ 'publiclotteryerdata' ],
data() {
    return {
        action: '/publiclottery/update', //edit action
        text: 'Updated Succesfully',
        redirect: '/publiclottery',

 company_names: [],

        fields: {
            publiclottery_id:this.publiclotteryerdata.publiclottery_id,
            company_name:this.publiclotteryerdata.company_name,
            license_no:this.publiclotteryerdata.license_no,
        return_for_of:this.publiclotteryerdata.return_for_of,
         return_to:this.publiclotteryerdata.return_to,
          date:this.publiclotteryerdata.date,
           total_tickets_sold:this.publiclotteryerdata.total_tickets_sold,
            sales:this.publiclotteryerdata.sales,
             deposits:this.publiclotteryerdata.deposits,
              total_sales:this.publiclotteryerdata.total_sales,
               payouts:this.publiclotteryerdata.payouts,
                ggr:this.publiclotteryerdata.ggr,
                 wht:this.publiclotteryerdata.wht,
             
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
        this.fields.publiclottery_id=this.publiclotteryerdata.publiclottery_id;
        this.fields.company_name=this.publiclotteryerdata.company_name;
        this.fields.license_no=this.publiclotteryerdata.license_no;
        this.fields.licensee_name=this.publiclotteryerdata.licensee_name;
         this.fields.return_for_of=this.publiclotteryerdata.return_for_of;
          this.fields.return_to=this.publiclotteryerdata.return_to;
           this.fields.date=this.publiclotteryerdata.date;
            this.fields.total_tickets_sold=this.publiclotteryerdata.total_tickets_sold;
             this.fields.sales=this.publiclotteryerdata.sales;
              this.fields.total_sales=this.publiclotteryerdata.total_sales;
               this.fields.payouts=this.publiclotteryerdata.payouts;
                this.fields.wht=this.publiclotteryerdata.wht;
                 this.fields.ggr=this.publiclotteryerdata.ggr;
                 this.fields.wht=this.publiclotteryerdata.wht;
   }
}
</script>
