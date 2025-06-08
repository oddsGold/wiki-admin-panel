import PageBreadcrumb from "../../components/common/PageBreadCrumb.jsx";
import PageMeta from "../../components/common/PageMeta.jsx";
import ComponentCard from "../../components/common/ComponentCard.jsx";
import {useLocation, useNavigate} from "react-router-dom";
import {useCreateUserMutation} from "../../redux/users/usersApiSlice.js";
import {acceptHandler, errorHandler} from "../../components/utils/toastHandler.js";
import {useRef} from "react";
import UserForm from "../../components/form/page-forms/UserForm.jsx";
import {useRolesQuery} from "../../redux/roles/rolesApiSlice.js";
import {useCrudPageLogic} from "../../hooks/useCrudPageLogic.js";

export default function CreateUserPage() {
    const navigate = useNavigate();
    const [createUser, {isLoading}] = useCreateUserMutation();

    const {
        data,
    } = useCrudPageLogic({useQuery: useRolesQuery});

    const location = useLocation();
    const previousPath = useRef(location.state?.from?.pathname ?? '/admin/users');

    const handleSubmit = async (values) => {
        try {
            await createUser({data: values}).unwrap();
            navigate('/admin/users');
            acceptHandler("Користувач успішно доданий");
        } catch (err) {
            errorHandler(err.data.message);
        }
    };

    return (
        <>
            <PageMeta
                title="Create new user"
                description="Create new user"
            />
            <PageBreadcrumb
                breadcrumbs={[
                    { title: "Home", to: "/admin/dashboard" },
                    { title: "Users", to: "/admin/users"},
                    { title: "Create new user"},
                ]}
            />
            <div className="space-y-6">
                <ComponentCard title="Create user">
                    <UserForm
                        defaultCurrent={{
                            login: '',
                            email: '',
                            role: null,
                            password: '',
                            password_confirmation: '',
                            tfa: true,
                        }}
                        password={true}
                        handleSubmit={handleSubmit}
                        roles={data}
                        backLinkPath={previousPath}
                    />
                </ComponentCard>
            </div>
        </>
    );
}
