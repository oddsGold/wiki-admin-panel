import PageMeta from "../../components/common/PageMeta.jsx";
import PageBreadcrumb from "../../components/common/PageBreadCrumb.jsx";
import UserMetaCard from "../../components/UserProfile/UserMetaCard.jsx";
import UserInfoCard from "../../components/UserProfile/UserInfoCard.jsx";
import UserAddressCard from "../../components/UserProfile/UserAddressCard.jsx";
import {useGetAccountQuery} from "../../redux/auth/authApiSlice.js";
import {Loading} from "../../components/loadingBar/Loading.jsx";

export default function UserProfiles() {
    const {data: user, error: isAccountError, isLoading: isAccountLoading} = useGetAccountQuery();

    if (isAccountLoading) {
        return (
            <div
                className="absolute inset-0 z-50 flex items-center justify-center bg-white/60 dark:bg-gray-900/60 rounded-3xl">
                <Loading/>
            </div>
        );
    }

    return (
        <>
            <PageMeta
                title="React.js Profile Dashboard | TailAdmin - Next.js Admin Dashboard Template"
                description="This is React.js Profile Dashboard page for TailAdmin - React.js Tailwind CSS Admin Dashboard Template"
            />
            <PageBreadcrumb pageTitle="Profile"/>
            <div className="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
                <h3 className="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7">
                    Profile
                </h3>
                <div className="space-y-6">
                    <UserMetaCard
                        user={user}
                    />
                    <UserInfoCard
                        user={user}
                    />
                    <UserAddressCard/>
                </div>
            </div>
        </>
    );
}
