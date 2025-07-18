import React from "react";
import {Routes, Route, Navigate} from 'react-router-dom';
import Home from "../pages/Dashboard/Home.jsx";
import NotFound from "../pages/OtherPage/NotFound.jsx";
import UserProfiles from "../pages/Profile/UserProfiles.jsx";
import UserPage from "../pages/UserPage/UserPage.jsx";
import CreateUserPage from "../pages/UserPage/CreateUserPage.jsx";
import EditUserPage from "../pages/UserPage/EditUserPage.jsx";
import ImagePage from "../pages/DownloadPage/ImagePage.jsx";
import FaqPage from "../pages/FaqPage/FaqPage.jsx";
import CreateFaqPage from "../pages/FaqPage/CreateFaqPage.jsx";
import EditFaqPage from "../pages/FaqPage/EditFaqPage.jsx";
import VideoPage from "../pages/VideoPage/VideoPage.jsx";
import CreateVideoPage from "../pages/VideoPage/CreateVideoPage.jsx";
import EditVideoPage from "../pages/VideoPage/EditVideoPage.jsx";
import RolePage from "../pages/RolePage/RolePage.jsx";
import CreateRolePage from "../pages/RolePage/CreateRolePage.jsx";
import EditRolePage from "../pages/RolePage/EditRolePage.jsx";
import FilePage from "../pages/DownloadPage/FilePage.jsx";

const PrivateRoutes = () => {
    return (
        <Routes>
            <Route path="/admin/dashboard" element={<Home />} />

            <Route path="/admin/profile" element={<UserProfiles />}/>

            <Route path="/admin/users" exact element={<UserPage />}/>
            <Route path="/admin/users/:id/edit" element={<EditUserPage/>}/>
            <Route path="/admin/users/create" element={<CreateUserPage />}/>

            <Route path="/admin/roles" exact element={<RolePage/>}/>
            <Route path="/admin/roles/:id/edit" element={<EditRolePage/>}/>
            <Route path="/admin/roles/create" element={<CreateRolePage/>}/>

            {/*<Route path="/news" exact element={<BlogPage/>}/>*/}
            {/*<Route path="/news/:id/edit" element={<EditBlogPage/>}/>*/}
            {/*<Route path="/news/create" element={<CreateBlogPage/>}/>*/}

            <Route path="/admin/faqs" exact element={<FaqPage/>}/>
            <Route path="/admin/faqs/:id/edit" element={<EditFaqPage/>}/>
            <Route path="/admin/faqs/create" element={<CreateFaqPage/>}/>

            <Route path="/admin/images" exact element={<ImagePage/>}/>
            <Route path="/admin/files" exact element={<FilePage/>}/>

            {/*<Route path="/users/memos/types" exact element={<TypePage/>}/>*/}
            {/*<Route path="/users/memos/types/:id/edit" element={<EditTypePage/>}/>*/}
            {/*<Route path="/users/memos/types/create" element={<CreateTypePage/>}/>*/}

            {/*<Route path="/users/memos" exact element={<MemoPage/>}/>*/}
            {/*<Route path="/users/memos/:id/edit" element={<EditMemoPage/>}/>*/}
            {/*<Route path="/users/memos/create" element={<CreateMemoPage/>}/>*/}

            <Route path="/admin/videos" exact element={<VideoPage/>}/>
            <Route path="/admin/videos/:id/edit" element={<EditVideoPage/>}/>
            <Route path="/admin/videos/create" element={<CreateVideoPage/>}/>

            <Route path="/admin/404" element={<NotFound />}/>
            <Route path="*" element={<Navigate to="/admin/404"/>}/>
        </Routes>
    );
};

export default PrivateRoutes;
