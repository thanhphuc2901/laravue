<!--Component màn hình Sửa thông tin-->
<template>
    <div class="edit">
        <h1>Cập nhật dữ liệu học sinh</h1>
        <div class="component-cotainer">
            <form @submit.prevent="updateStudent">
                <!--Danh sách lỗi validate-->
                <p v-if="errors.length">
                    <b id="content">Vui lòng hoàn thành các yêu cầu sau:</b>
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="student_code">Mã học sinh</label>
                            <input id="student_code" name="student_code" type="text" class="form-control" v-model="student.student_code">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="student_code">Tên học sinh</label>
                            <input id="student_name" name="student_name" type="text" class="form-control" v-model="student.student_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Giới tính</label>
                            <select id="gender" class="form-control" v-model="student.gender">
                                <option value = "0">Nam</option>
                                <option value = "1">Nữ</option>
                                <option value = "2">Khác</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Lớp</label>
                            <select id="grade" class="form-control" v-model="student.grade">
                                <option value = "0">10</option>
                                <option value = "1">11</option>
                                <option value = "2">12</option>
                            </select>
                        </div>
                    </div>
                </div>            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <textarea class="form-control" v-model="student.address" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" v-model="student.email">
                        </div>
                    </div>
                </div>           
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>GPA</label>
                            <input min="0" max="4" step="1" type="number" class="form-control" v-model="student.GPA">
                        </div>
                    </div>
                </div><br />
                <div class="form-group">
                    <button class="btn btn-primary">Cập nhật</button>
                    <button class="btn btn-danger" @click.prevent="cancelForm">Hủy bỏ</button>
                </div>
            </form>
        </div>
    </div>
</template>

<style>
    .edit {
        background-color: white;
        border-radius: 5px;
        padding: 1px 10px 10px 10px;
    }
    .component-cotainer {
        border: 1px solid black;
        border-radius: 5px;
        padding: 5px 0px 0px 10px;
    }
</style>

<script>
    export default {
        data() {
            return {
                student: {},
                errors: []
            }
        },
        created() {
            let uri = `http://localhost:8000/api/list/edit/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.student = response.data;
                // dd(response.data);
            });
        },
        methods: {
            //Hàm chỉnh sửa dữ liệu
            updateStudent: function(e) {
                //Validate trống
                this.errors = [];
                if (!this.student.student_code) {
                    this.errors.push('Không bỏ trống mã học sinh');
                    document.getElementById('student_code').style.borderColor = "red";
                } else {
                    document.getElementById('student_code').style.borderColor = "black";
                }
                if (!this.student.student_name) {
                    this.errors.push('Không bỏ trống tên học sinh');
                    document.getElementById('student_name').style.borderColor = "red";
                } else {
                    document.getElementById('student_code').style.borderColor = "black";
                }
                e.preventDefault();

                if(this.errors.length == 0){
                    let uri = `http://localhost:8000/api/list/update/${this.$route.params.id}`;
                    this.axios.post(uri, this.student).then((response) => {
                        this.$router.push({name: 'lists'});
                    }).catch(() => {
                        alert('Mã học sinh đã tồn tại! Vui lòng nhập mã khác!');
                        document.getElementById('student_code').style.borderColor = "red";
                    });
                }
            },
            //Thoát form thêm mới
            cancelForm: function(e) {
                if(confirm("Bạn có muốn thoát thao tác?")){
                    this.show = false;
                    this.$router.push({ name: 'lists' });
                }
            }
        }
    }
</script>