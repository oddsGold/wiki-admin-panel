import {SidebarProvider, useSidebar} from "../context/SidebarContext.jsx";
import {Outlet} from "react-router";
import AppHeader from "./AppHeader.jsx";
import Backdrop from "./Backdrop.jsx";
import AppSidebar from "./AppSidebar.jsx";
import {useGetAccountQuery, useLogoutMutation} from "../redux/auth/authApiSlice.js";
import {errorHandler} from "../components/utils/toastHandler.js";

const LayoutContent = () => {
    const {isExpanded, isHovered, isMobileOpen} = useSidebar();
    const {data: user, error: isAccountError, isLoading: isAccountLoading} = useGetAccountQuery();
    const [logout, { isLoading: logoutLoading }] = useLogoutMutation();

    const handleLogout = async () => {
        try {
            await logout();
        } catch (error) {
            errorHandler('Logout failed');
        }
    };

    const isLoading = isAccountLoading || logoutLoading;

    if (isLoading) {
        return <div className="p-6 text-center text-gray-500">Loading...</div>;
    }

    return (
        <div className="min-h-screen xl:flex dark:bg-gray-900">
            <div>
                <AppSidebar/>
                <Backdrop/>
            </div>
            <div
                className={`flex-1 transition-all duration-300 ease-in-out ${
                    isExpanded || isHovered ? "lg:ml-[290px]" : "lg:ml-[90px]"
                } ${isMobileOpen ? "ml-0" : ""}`}
            >
                <AppHeader
                    user={user}
                    handleLogout={handleLogout}
                />
                <div className="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                    <Outlet/>
                </div>
            </div>
        </div>
    );
};

const AppLayout = () => {
    return (
        <SidebarProvider>
            <LayoutContent/>
        </SidebarProvider>
    );
};

export default AppLayout;
