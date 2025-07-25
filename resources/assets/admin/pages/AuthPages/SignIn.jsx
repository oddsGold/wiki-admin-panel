import PageMeta from "../../components/common/PageMeta.jsx";
import AuthLayout from "./AuthPageLayout.jsx";
import SignInForm from "../../components/auth/SignInForm.jsx";

export default function SignIn() {
  return (
    <>
      <PageMeta
        title="SignIn Form"
        description="SignIn Form"
      />
      <AuthLayout>
        <SignInForm />
      </AuthLayout>
    </>
  );
}
