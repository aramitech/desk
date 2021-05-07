<template>
    <div class="modal fade" id="addpublicgaming" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add Public Gaming Company</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                        <div class="form-group">
							<label>Company Name</label>
							<input class="form-control" name="company_name" v-model="fields.company_name" type="text" placeholder="Company Name" required>
                            <div v-if="errors && errors.company_name" class="text-danger">{{ errors.company_name[0] }}</div>
						</div>
                        
						<div class="form-group">
							<label>Trading Name</label>
							<input class="form-control" name="trading_name" v-model="fields.trading_name" value="" type="text" placeholder="Trading Name" required>
                            <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
						</div>
                        <div class="form-group">
							<label>License No</label>
							<input class="form-control"  name="license_no" v-model="fields.license_no" value="" type="text" placeholder="License No" required>
                            <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
						</div>
                        <div class="form-group">
							<label>Email</label>
							<input class="form-control"  name="email" v-model="fields.email" value="" type="email" placeholder="Email" required>
                            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
						</div>
                        <div class="form-group">
							<label>Contact</label>
							<input class="form-control"  name="contact" v-model="fields.contact" value="" type="text" placeholder="Contact" required>
                            <div v-if="errors && errors.contact" class="text-danger">{{ errors.contact[0] }}</div>
						</div>
                             <div class="form-group">
							<label>Location</label>
							<input class="form-control"  name="physicaladdress" v-model="fields.physicaladdress" value="" type="text" placeholder="Physical Address" required>
                            <div v-if="errors && errors.physicaladdress" class="text-danger">{{ errors.physicaladdress[0] }}</div>
						</div>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

export default {
  mixins: [ FormMixin ],
data() {
    return {
        action: '/company/addpublicgaming', //save action
        text: 'Added Succesfully',
        redirect: '/company/publickgaming',
        }
    },

methods: {

    }
}
</script>
