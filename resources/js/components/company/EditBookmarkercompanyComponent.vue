<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Edit Company</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

export default {
  mixins: [ FormMixin ],
  props: [ 'bookmarkerdata' ],
data() {
    return {
        action: '/company/update', //edit action
        text: 'Updated Succesfully',
        redirect: '/company/bookmarkers',
         company_names:[],
        fields: {
            company_id:this.bookmarkerdata.company_id,
           // category_type_id:this.bookmarkerdata.category_type_id,
            company_name:this.bookmarkerdata.company_name,
            trading_name:this.bookmarkerdata.trading_name,
            license_no:this.bookmarkerdata.license_no,
            email:this.bookmarkerdata.email,
            contact:this.bookmarkerdata.contact,
            physicaladdress:this.bookmarkerdata.physicaladdress,
            branch:this.bookmarkerdata.branch,
             paybillno:this.bookmarkerdata.paybillno,
            categorytype:this.bookmarkerdata.categorytype,
            category_type_id:this.bookmarkerdata.CompanyCategoryType, 
             
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
