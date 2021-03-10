<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Edit Company</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
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
							<label>Physical Address</label>
							<input class="form-control"  name="physicaladdress" v-model="fields.physicaladdress" value="" type="text" placeholder="Physical Address" required>
                            <div v-if="errors && errors.physicaladdress" class="text-danger">{{ errors.physicaladdress[0] }}</div>
						</div></div>
 <div class="form-group row">
                        <div class="col-md-6">
							<label>Branch</label>
							<input class="form-control"  name="branch" v-model="fields.branch" value="" type="text" placeholder="Branch" required>
                            <div v-if="errors && errors.branch" class="text-danger">{{ errors.branch[0] }}</div>
						</div>
                        
                                                 <div class="col-md-6">
            <label for="category_type_id"> Category</label>        
            <multiselect  name="category_type_id" v-model="fields.category_type_id"   label="categorytype" placeholder="Select Category name" :options="company_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>
            <div v-if="errors && errors.category_type_id" class="text-danger">{{ errors.category_type_id[0] }}</div>
       
        </div> 
                        
                        </div>
                         <div class="form-group row">
                        <div class="col-md-6">
							<label>PAYBILL NO</label>
							<input class="form-control"  name="paybillno" v-model="fields.paybillno" value="" type="text" placeholder="Paybill No" >
                            <div v-if="errors && errors.paybillno" class="text-danger">{{ errors.paybillno[0] }}</div>
						</div>	</div>
                    </div>





                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>  </div>
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
        action: '/company/updateBookmarkersCompany', //edit action
        text: 'Updated Succesfully',
        redirect: '/company/bookmarkers',
         company_names:[],
        fields: {
            company_id:this.bookmarkerdata.company_id,
            category_type_id:this.bookmarkerdata.category_type_id,
            company_name:this.bookmarkerdata.company_name,
            trading_name:this.bookmarkerdata.trading_name,
            license_no:this.bookmarkerdata.license_no,
            email:this.bookmarkerdata.email,
            contact:this.bookmarkerdata.contact,
            physicaladdress:this.bookmarkerdata.physicaladdress,
            branch:this.bookmarkerdata.branch,
             paybillno:this.bookmarkerdata.paybillno,
            categorytype:this.bookmarkerdata.categorytype,

             
        }
        }
    },

methods: {
      getCategoryTypeName: function(){   
        axios.get('/CategoryTypeNam/get')
        .then(function(response){
          this.company_names = response.data;        
        }.bind(this));
      },
    },
    mounted() {
        this.fields.company_id=this.bookmarkerdata.company_id;
        this.fields.category_type_id=this.getCategoryTypeName;
        this.fields.company_name=this.bookmarkerdata.company_name;
        this.fields.trading_name=this.bookmarkerdata.trading_name;
        this.fields.license_no=this.bookmarkerdata.license_no;
        this.fields.email=this.bookmarkerdata.email;
        this.fields.contact=this.bookmarkerdata.contact;
        this.fields.physicaladdress=this.bookmarkerdata.physicaladdress;
        this.fields.branch=this.bookmarkerdata.branch;
         this.fields.paybillno=this.bookmarkerdata.paybillno;
           this.fields.categorytype=this.bookmarkerdata.categorytype;
    },
          created: function(){  
     this.getCategoryTypeName()   
    },
}
</script>
