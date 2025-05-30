import React from "react";
import GridShape from "../../components/common/GridShape.jsx";
import authLogo from "../../../images/logo/auth-logo.svg";
import ThemeTogglerTwo from "../../components/common/ThemeTogglerTwo.jsx";

export default function AuthLayout({ children }) {
    return (
        <div className="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
            <div className="relative flex flex-col justify-center w-full h-screen lg:flex-row dark:bg-gray-900 sm:p-0">
                {children}
                <div className="items-center hidden w-full h-full lg:w-1/2 bg-brand-950 dark:bg-white/5 lg:grid">
                    <div className="relative flex items-center justify-center z-1">
                        {/* ===== Common Grid Shape Start ===== */}
                        <GridShape />
                        <div className="flex flex-col items-center max-w-xs">
                            <div className="block mb-4">
                                <img
                                    width={231}
                                    height={48}
                                    src={authLogo}
                                    alt="Logo"
                                />
                            </div>
                            <p className="text-center text-gray-400 dark:text-white/60">
                                Welcome to WIKI
                            </p>
                        </div>
                    </div>
                </div>
                <div className="fixed z-50 hidden bottom-6 right-6 sm:block">
                    <ThemeTogglerTwo />
                </div>
            </div>
        </div>
    );
}
