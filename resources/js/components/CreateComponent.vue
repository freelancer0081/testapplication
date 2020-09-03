<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Add Guest book</h3>
                <div>
                    <form
                        method="post"
                        action="#"
                        @submit.prevent="editflag ? updatedata() : submitdata()"
                    >
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="first_name"
                                v-model="form.first_name"
                                required
                            />
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="last_name"
                                v-model="form.last_name"
                                required
                            />
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                v-model="form.email"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input
                                type="number"
                                class="form-control"
                                name="phone"
                                v-model="form.phone"
                            />
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select
                                class="form-control"
                                name="gender"
                                v-model="form.gender"
                                required
                            >
                                <option value="">-Select-</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea
                                type="text"
                                class="form-control"
                                name="address"
                                v-model="form.address"
                                required
                            ></textarea>
                        </div>
                        {{ editflag ? fillData : "" }}
                        <button type="submit" class="btn btn-primary">
                            {{ editflag ? "Update Guest" : "Add Guest" }}
                        </button>
                        <router-link to='/' class='btn btn-warning'>Cancel</router-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapState } from "vuex";
export default {
    data() {
        return {
            form: {
                first_name: "",
                last_name: "",
                email: "",
                phone: "",
                gender: "",
                address: "",
                editid:'',
            }
        };
    },
    methods: {
        submitdata() {
            this.$store.dispatch("create", this.form);
        },
        updatedata() {
           
            this.$store.dispatch("update", this.form);
        }
    },
    computed: {
        ...mapGetters(["EditData"]),
        ...mapState(["editflag", "editData"]),
        
        fillData() {
            this.form.first_name = this.$store.state.editData.first_name;
            this.form.last_name = this.$store.state.editData.last_name;
            this.form.email = this.$store.state.editData.email;
            this.form.phone = this.$store.state.editData.phone;
            this.form.gender = this.$store.state.editData.gender;
            this.form.address = this.$store.state.editData.address;
             this.form.editid = this.$store.state.editData.id;
            //console.log(editData);
        }
    }
};
</script>
