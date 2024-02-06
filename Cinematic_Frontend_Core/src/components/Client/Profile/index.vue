<template>
    <div class="page-content" style="margin-bottom: 40%;">
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAMAAzAMBIgACEQEDEQH/xAAcAAABBAMBAAAAAAAAAAAAAAAAAQQGBwIDBQj/xABBEAABAwIEAwUFBgMFCQAAAAABAAIDBBEFEiExBkFREyJhcYEHFDKRoSNCUrHB0TNy8BViouHxJDVTVGNzgrLC/8QAGgEAAgMBAQAAAAAAAAAAAAAAAAQCAwUBBv/EACgRAAICAQQBAwQDAQAAAAAAAAABAgMRBBIhMQUTIkEjMlFxYYGRQv/aAAwDAQACEQMRAD8AvFCEIAEIQgAQhCABCEl0AB2K4XEGNDD2dlDldUOG51DR4rrV1XHR0ktRKbNYL+Z5BVrUzPqql80ussjteihOW1Duj03qy3S6Q/qOIcSmjsKgMA3LBYlNKDFq6gldNFKZM3xse64d4rVHC7K4kbJWw5TYjVKysk+jXVNSTW0lPC/EElbPLR172+8DvRkCwcOnopONgqme99NWNnZcPY9sgI8DorWppGzQRyt+F7Q4eqYqnuXJla/TqqalHpm1CEK0QBCEIAEJEqABCEIAEIQgAQhCABCEIAEIQgAQhCABIUq0VdQ2mppZn/DG0uPogMZ4IrxdX9tOyhhIIj70nnbRcGKMm7i22UrKWQzvkleRncS/T5lb2M1cBezglLZZZ6CqCqgoobMqM3aEC3esPJOosr9dLhhTGFuTukXuSPJZNcGTX5baKkuayJXs+zlc0aDf5qxsJAGGUgGwhb+SgOIWfSSdXDRT7ChlwykH/RZ+QTFHyZ3kH7IjxCRJfqmTKMkh2WiqrKejiMlTNHEwc3uAUWxfjinhvHh0Rnfexe/ut9OqhKcY9ltVFlrxBEuuPmlvZVVWcUYxWd33rsWW+GEZfruo7X1B1MksrpZBY3kN3DoTfUeCpeqgujQh4mxr3PBdxxGia/I6spw/8Jlbf81vZKyQZo3teOrTcLzqY2bBjA3kA0LrYBxBXcPvf7iWdk/V0Th3SevgVCOrTfKJz8TJR9sssvfklUd4P4jZxBhwe7Iyrj0mibfu6mx8jZSJNpp8oyZwlCTjLsEIQukQQhCABCEIAEIQgAUa42qezw1kLXEOlkFwOYGv7KSquuMsQ94x33dpGSnbb1P9BRm8Ia0VfqXJDWny52E2v8J9VsklLewu7W9rJhDPkeHWu07p5iRb9jO0gtf3v3SmM8m5JYkjAh3vLwDYDUrGUta7u+aJZD22Zp+NoKwrM2cOPQDRRwSxybnP+weDzP0VjYd/u6l/7TfyCrFsmfMHG4srOou5QwA8omj6BX0fJmeS/wCUbpZGxMc+Rwa1ouSeShmNcUTTO7HDHOjZzly953LS+wWjiXGjiFT7vTm9LG+x/vnr5LgVEzgAPxdOijda1xEnotFHG+z/AAYVWc1DnSvdIbkZ3uJPzWrYeC3SuLpMg1DP6utL3C3QDdINtvk2kkujF5GrT0vdcqRvZ3L295/wjoE7qKi7LkZW8gd3H9kwDsxzXvfmg6INkIQuAdrgp7mcU4f2cpjzSjNY2DhY6HqryB0XnRrnMcHMcWuBuCDYgq7+D8TlxXAaWqqABIQWutzsbXT2lnxtZi+WqeVav0d1CRKnDGBCEIAEIQgAQhCAEJVK4pXCoxmumOhNQ8D0Nv0V1FUFjTjT8QYnFI0Nc2rkcR5uuPobqi/o1fFY3y/R1GVOYaXHknwl94pMh+JhuPI6FRmCrEb8x2Gh8k9iqeyl37hFr+B3SyZtzhlnXmIdS07muNxdpWzEZAzKNtGn+vkubNO00zowL98EErKpl7aQeDGiykVJco3Uz3SVIiaDmc5oHqbKwuMMRGHYUIIiRLP3G2NrN5n+uqgPB0QruIIhuGzdpm/l1XY43rBNjoj+5DGB67lTg8QbEtVFWamMfhHIadMo8lqe+2Y/gBQJGxRSOtd17ADr/X5hM3OAikLyMuYX8TvZUseismuaZscRJOUkaaHdMnVrKeJ80r7tJAaCLE2WqtmDxmJysbufFcmV3bvbLLpEDZreqoaaLzfLVurJXBhcG23y2vr9Fva0MAawAAaCyxYwEjMBqbgW2TmB0cTmuLczteeg0UQFgpXytJ2sd78rLKXI1hELQ7k52W9vVZTTdqwB0mnRnI673TZzyTp3b8gdEAKWuYbEA3byVleyzFYn0s2E9mRLDeXPmuHAm3pa4VZE3Fyrg9nmCxYbg0dSWj3qqaHvfuQOTfIJnSpueUZ3k5RVOH2SzmlSAJVonnQQsQdEj5GsaXPIa0c3aBAGaS65j8fwSNxa/GMPa4bh1UwEfVbosWwyZwbDiNJI52wZO0k/Vcyju2X4H10l0nki66cFKp/2q4X7pjsdfG20dYyzumdv+Vvkrfv0XD4xwIcQYHNSMLROPtIHHYPG3odR6qFkd0RjSXelapfBRre9onEZLm5XH4fqm7mPje5sjSyWNxD2O3aRuCnLG5mZgbHqkej06fBmJyYyM1yNE8bK5zs4FwGA/Jc8NdnabFwGjgBsul2eancxtm5m20Uov8kJSSJL7KGxh1fVyjKI23DidADf9lyMRxL36tq6k2+1dYW6A3/QJ/h2XD+CcTjae/PMyBniNC7/AA5lFnF5OUA2tyGyk5e1RQlW9185/wBDuSquA0HQdOqaTTFzGtL7BhuT1Ky7Exs1vm6JnMABqbNHLqqx2EkNamUPOYglgOgPNYU0eeTtJOfwt5LVKTIbM2HNOqaEN75JLj8vRQn0Xm/c7WQhB03uNL6qoASE811MAwGv4glAoIXGnv3qhwtEPXn6Ky+HeBMOwpzaiqJrKoG4dIO4w9Wt29VfXRKQnqNdXRxnLIhwpwPWYlMypxSJ1NRtIcGO+OYb7ch5/IK2o42xsaxjAGNAAA0AAWWw1WSfrrUFhHn79RO+W6QIQhTKCIe0DipvD2G9lTuAxGoaRCN8vV/oqQq6iWukL66WSpcTfNO8vN/VTD2v0ssHFDah0hcypgGQE/Dl0IHzUHa08yElbJuTR6Hx9MI1KXyzfnNgAbAckhcbEFrXA7ghYajYpbF33voqh7A4psRnoyPdZJqcDbsZSy3yK72GceY1RuA/tGWRn4Z/tB8zr9VG7EDQ39Fg4X+NllNSfwyEqa5/ci4cB9pNNUtazE4TG4n+LEbt9RuFOaKtpq6Bs9JMyaN2zmFeYv4bgY3Fh8dLrqYTxFX4TUCSCZ8Lr3LmH4vMbH1Vsbsdmff4yMua2WzxvwY3EnyYphrWtrA37SMDSa3/ANfmq4ED4wbgjWx0tr5clZPC3tAoMVbHBXPbT1O2YnuOPny9V0sf4Yo8aYaqmLI6oi4lbq1/n+67OCksxKKNTPT/AE7VwVlBT9qx1juF0KWmADb6gJ1LRS4VMYKyExu2Drd13kea01NVHBGXA3A6apKeUXu52PEQsZclIdImOLwPE/6LGTDxcZBY8lpe2Wsp2PpnZC54yuOll0o6nspOyksXjQ2K5znJ10zjyhm/CXvhLjqTy5ny6rh1+HvudL2U4jqLWu0tYdwRukxGLDjB2ktfSQ3F3Ad8j0CZUU0QhqJRfJWZpyx5a9trbBbLbABdLGpaG7WUsk0hH33syi3gN1zLgjTZLTzk1q571lm6jg99lyRzQMaPiklkDGt9f2UlweDhLDZhJjNd/aE4OkcULjC3z6+qiejGnQAIJGx1ty3upQsjH4KraXbxuwXhhvE/D9SGRUuJUsZtZsTnCM+gNl22PaW5mkFvUHRea6gMJvJ4jXp5LZgHEGI8O1Xa4VOYonG74D/Df5t/UapmOqXyjMt8U0m4SyekuVwslEeCONKfieF8T4vd66FuZ8Oa4cPxNPS/yUuGybTTXBkzhKuW2XYIQhdIlBe0rEJ8Q4urI3k9jSEQxNGwGUE/U/QKLhmtgpHxtg82D8RVkU0r5xO41DZXCxIcSbeh/RR+/VZ037nk9bpYxVMdvWDNugtosxfkQtN29CsmuHJpUS/BuuRzBSk3b/DaVhf+6PVZBxGoY35KRzBg5otYw/VYdhEPia5vkU6bJI7pbwasnQyWu+TI3xACCJqp4mRuBilAePuuFj5KW4NW3Y1pcQRvY3UUs1tg1z3J/QyvY4HUeZXOiu6tWR5LAp8sjBmc5wGtiboqI25btaPFc/BZJJBYuXYDB8LxqDdcse2Dl+DFx6czlVNNHR0VTVSxOY7LcMBWrhQQYlH2s8dpI38+RXZqY3yWZ2bnNN899RayacL0bIMRcIRZj9XsOl7c/NUaWc7o5ksMYlqEos71XGBTklQXiGRzQcriL6Ka19YxzHMBuNrc1BeIZGBzg64ATVix0V6N+4ik8ro793zuU0fWyD4LArZVTRvccpF76aJsS4nu3KglxyazbYdu951cboa6xJNzfqUhvzBB8UFVyRbHg2GY2y2Bb0Oq13+SRCidHWG4hU4XXw11G/JPC4Fp5HwPUFXTwr7RsLxiJsVe+OgrNskju4/+V36FUYg6g31vvdW13Sr/AEKanRwvXPD/ACeqA8EAgg36c0q8/cJcb4lw05sTnuqqC2tO93w9C0nby2V28P4xT47hMGI0d+ylvo7QtINiD5EFP13RmjA1OlsofPRXHtfjAxeikyP1gILiNDqq/cy+obZXd7QOGqjiGgiNHJaopnFzYnfDJflfkqdqaaeinfBWU7oJ2jvMlblPn5eKWvi1LJu+MuhKlQzyhiGG+izDH8rLc7bf0ssLXPRUZNFpGIJb94+i2NkJ0tfxKLNG26UNcdCdF3JFo2NlczQPPkBb6pO/M7qfApGsYDY6jotoc53dZozoNFNFbQjWkfC638outjAxp0F3cySkGW4a3vyHbp6LoYfh0tXKyGJhlkkNg0C6klkhJqKyzqYDUlkjA3MC42aAdXHZS2ppuxnhZNJkme27mf8ADb4+aMPocM4NoHYni8sPvhb3G3Fwfws8fFRHD8dkxzF6ypcTcAE25XOgHhoq9ZJV6dmQ/rTcor2o7lbXGlErHzXHK3NcnDMXbFO61gDsVweKK0xTAMLgXDXN8JHguE2ufG7M1/lql9I2qkXLSqSyy7cOo4MfwcuD8lTE9zRJb1APUaqCcVUlRQyGnro8j92O3a8dQf0Xa9kGNCqqa7D5SM/Ztlb4gGx/NqnuO4JRY7RGlrorjdjx8TD1BWkob4JrsSdj01zi+jzfNo8g7XWAAGwt5KVcX8IYjw8900kZnobnLUsF8o1+P8Pnsot4hUSTXZtU2RmsxeTE7pEt736FBSz7GREIQuACEIXQDbUaHqru9ktC2HhBkjo5Y3TzySHOSL62BA6WaPzVNYbQ1GJV8dFRQOlnlcLMbvYbnXwXpTCaKPDsMpaOJhDIImsAJvaw6pvTQzlmR5W1JKI7TDEcFw7FGgYhRQT2FgXsGZo8DuPRdBCdaz2Yibi8ogWK+zOhmzOwuofSuP3H99v7qD8Q8H4tgTHTVEbZaUHWeI3A8xuFeqQi6qlRBj1Pkb6vnKPNdxyIPkbrIG4vp81feI8L4LiRcarDqcudu9rcrj6ixKitb7LqaWoL6XEZYoSf4b2B9vXn6ql6eS6NSry9UuJrBVw1Oi3Rxlxs76KyIfZdA1322KzEX2ZGBdGOYZw9wfh/bmAVlc4EQMqXZrnqRtlC56Mlyyb8lVJ7a8tlfSyxUMLTK0ntAcrbauH7LUeLMUpI3Mw90dEXCxkiaDIR0zG9h4CyYV9TPWVb5qiQzVUli59rAdAByA5Bafdi1wAsZXbnoFDL+BnZ6nM0aKierranNUTzTzO+/K8vd6klSDg8iGqnbntmj17t72TGKlZHGW/fdu7ontDGyCeKUggN7xANr6c1TfB2QcTtkE62kjbxRE6SSG4GUX23BUdnjI0I2UkxSsEzmtecpsLZjpfwXIrY+4DzO6jpq5Qr2sqqi1Dk6nsxqjScd4cA6zZ+0hd43aSPq0L0IBovNvCQ7PivCH3tasi1HmvSS0aPtMfyq+qn/BiW3aQeahnEfs3wbFs8tKz3CpOueEd0nxbt8lNUWVzin2Z8LJ1vMXg87cS8IYxw7eStgEtLfSqh1Z/5fh9dPFR9ep3xh7XMe0Oa4WIOoIUGx/2X4NiGeTDs2Hzk3HZ6sv8Ay8vRKWaVPmJr6fynGLV/ZSKFJsf4Gx7BnOe+kdVQDXtqYF/zbuPqow1zXOc1rgS02IvslHCUe0asLoWLMWKlY1z3tZGxz3u+FjRcn0SX0vyVweyHhySio341UlpfWRgU4a64EWhuehJ+gU6a/Ulgr1OoVENxn7PeAW4b2OJ4xH/t8by6FscpysaRpcWHe3VjrG1raLJaUIqKwjzFtsrZOUgQhCkVghCEACRKkKAGWMYjBhWG1NdVG0UDC91tz4DxJ0VBcQY5V41iTqypI7R3daxv3G8gpt7YsfLXQ4JE62gnmt/h/f0CrGIkHN96yUunl4N3xunUYeo+2O6dnZ3ebZz1TiBjW3J1J1JTZrszrpzctIaOaobNlLgyymRr7PDXPBsehWttHKZmfatdFpmObVbu6I7Ad9x+QW9hAdcahjS7VdTDAxxZ93CCxJI7o8b9U2zEwtDxYgAWuuhK4FrATe9yVzpiLabXXSLjgdcMAnibCrf85F/7Bekl534CgdU8Z4TExpdaftXEcg0FxP0t6r0QmdP9p53yjzYkKhCFeZoJClQgDEjqUyq8IwyuOatw+kqD1lha4/UJ+hcOptdHGdwvgDm5TguH28KZg/RdKlpYaSnjp6WJsUEYysYwWDR0W9CEkugcpPtiJUIXTgIQhAAhCEACxcskhQB524/mlm4zxXtw4ObMGtB1s0NFvTn6rhscSrk9ofAseNPqMYpppI6iKldmhjjzdsWgkDrfkqccx8TzHLFJHI34mPaWuHmDskrYtSPSaG+FlaS7RuY/otrJTfMTqdAmTSb26LcH63KqNJD+OQDU8gsu2tBpu9yY57gAdbofKXC10IllG6WUXIB2bYJpIe6Agk2J6BTTgTgd3ETW4jWvdFhuawa096Yjp0HjzUoxcnhCuovjVDdI73sd4edDG/H6gWM7DDTNtsy+rvWw+StALVSU0NJTR09NG2OGNoaxrdgAttk9GO1YPLX2u2xzYqEIUioEIQgAQhCABCEIAEIQgAQhCABCEIAEnNKhACWHRVxx/wAB1eOYuzEMIMEbnR2nEhtmcNjoOmishYqMoqXDLabZUz3Q7PMdbh9bQSllbST0zsxH2sTm5rb2JGo8QtDSvQXGfDEHE2GiB5yVEJLoJfwnn6FUzj3CuL8PuiGIQMLZR3XwXc2/S9t0pOtxfBv6XXwtj7nhnF2QTlaeuizpo5KmrjpYGmSeR+RkbdXOceVlbfAfAL8LqW4ljHZuqWD7CFveEV+ZP4h4LkIORdqdZXTDnsZ8A+z9sfZ4pj8IdIReGkkF2tv95w6+HJWaxrWtDWgADkAsmiwWScjFRWEeauunbLdIQbaJUIUioEIQgAQhCABCEIAEIQgAQhCAP//Z"
                                        alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-4">
                                        <h4 class="text-capitalize">{{ ho_ten }}</h4>
                                    </div>
                                    <input type="file" name="" id="" class="form-control mt-3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h5 class="mt-2 fw-bold fs-6 text-end">Họ và tên :</h5>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" v-model="update_data_user.name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h5 class="mt-2 fw-bold fs-6 text-end">Email : </h5>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" disabled v-model="update_data_user.email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h5 class="mt-2 fw-bold fs-6 text-end">Số điện thoại :</h5>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" v-model="update_data_user.phone">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h5 class="mt-2 fw-bold fs-6 text-end">Địa chỉ : </h5>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" v-model="update_data_user.address">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateUser">Cập
                                        nhật</div>
                                    <div class="text-success mt-2 d-none sus"><i class="fa-solid fa-check"></i> Cập nhật
                                        thành công</div>
                                    <div class="text-danger mt-2 d-none err"><i class="fa-solid fa-x"></i> {{ err_notify }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade " style="margin-top: 100px;" id="updateUser" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog bg-white">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Cập nhật thông tin
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center text-secondary">
                    <div class="alert alert-primary" role="alert">
                        <b><i> Bạn Có Chắc Chắn muốn cập nhật thông tin ko ? </i></b>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-success" v-on:click="updateDataUser()" data-bs-dismiss="modal">Cập
                        nhật</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            ho_ten: "",
            user: "",
            update_data_user: {},
            err_notify: "",
        }
    },
    mounted() {
        this.beforeRouteUpdate();
        this.getDataUser();
    },
    methods: {

        getDataUser() {
            axios
                .post('http://127.0.0.1:8000/api/admin/client/get-data-user', {}, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("tokenClient")
                    }
                })
                .then((res) => {
                    this.ho_ten = res.data.data.name;
                    this.update_data_user = res.data.data;

                })
                .catch((res) => {

                });
        },
        updateDataUser() {
            axios
                .post('http://127.0.0.1:8000/api/admin/client/update-data-user', this.update_data_user, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("tokenClient")
                    }
                })
                .then((res) => {
                    // var phone = this.update_data_user.phone;
                    // console.log(phone);
                    // function checkPhone(sdt) {
                    //     const cleanedPhone = sdt.replace(/[^\d]/g, '');
                    //     const isValid = /^0\d{9,10}$/.test(cleanedPhone);
                    //     return isValid;
                    // }
                    // var isValidPhone = checkPhone(phone);
                    var successMessage = document.querySelector('.sus');
                    var errMessage = document.querySelector('.err');
                    if (res.data.status == true) {
                        localStorage.setItem("username_client", res.data.request.name);

                        successMessage.classList.remove("d-none");
                        errMessage.classList.add("d-none");
                        setTimeout(function () {
                            location.href = location.href;
                        }, 700);
                    } else {
                        this.err_notify = res.data.message;
                        successMessage.classList.add("d-none");
                        errMessage.classList.remove("d-none");
                    }
                })
                .catch((err) => {

                });
        },
        updateAvatar(v) {
            axios
                .post('http://127.0.0.1:8000/api/admin/movie/update', this.update_information)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('SUCCESS<br>' + res.data.message);
                        this.loadOneMovie(v);
                    }
                    else toaster.error('ERROR<br>' + res.data.message);
                });
        }
        ,
        beforeRouteUpdate(to, from, next) {
         window.scrollTo(0, 0);
      },
    }
}
</script>
<style></style>