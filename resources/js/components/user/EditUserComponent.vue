<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form method="POST" @submit.prevent="submit">
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" v-model="fields.name" type="text" placeholder="John Doe" required>
                    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" v-model="fields.email" value="" type="email" placeholder="me@example.com" required>
                    <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                </div>
                                       			<div class="form-group">
							<label>Personal File No</label>
							<input class="form-control" name="perspnal_file_no" v-model="fields.perspnal_file_no" value="" type="text" placeholder="Personal File No" >
                            <div v-if="errors && errors.perspnal_file_no" class="text-danger">{{ errors.perspnal_file_no[0] }}</div>
						</div>

                        		<div class="form-group">
							<label>Department/Section</label>
							<input class="form-control" name="section" v-model="fields.section" value="" type="text" placeholder="Section" >
                            <div v-if="errors && errors.section" class="text-danger">{{ errors.section[0] }}</div>
						</div>

                        		<div class="form-group">
							<label>Phone</label>
							<input class="form-control" name="phone" v-model="fields.phone" value="" type="text" placeholder="0712516957" required>
                            <div v-if="errors && errors.phone" class="text-danger">{{ errors.phone[0] }}</div>
						</div>
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
        action: '/users/update', //edit action
        text: 'Updated Succesfully',
        redirect: '/users',
        fields: {
            id:this.userdata.id,
            name:this.userdata.name,
            email:this.userdata.email,
                perspnal_file_no:this.userdata.perspnal_file_no,
                    section:this.userdata.section,
                        phone:this.userdata.phone,
        }
        }
    },

methods: {

    },
    mounted() {
        this.fields.id=this.userdata.id;
        this.fields.name=this.userdata.name;
        this.fields.email=this.userdata.email;
        this.fields.perspnal_file_no=this.userdata.perspnal_file_no;
        this.fields.section=this.userdata.section;
        this.fields.phone=this.userdata.phone;
    }
}
</script>
