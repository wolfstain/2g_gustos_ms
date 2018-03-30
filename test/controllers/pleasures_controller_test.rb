require 'test_helper'

class PleasuresControllerTest < ActionDispatch::IntegrationTest
  setup do
    @pleasure = pleasures(:one)
  end

  test "should get index" do
    get pleasures_url, as: :json
    assert_response :success
  end

  test "should create pleasure" do
    assert_difference('Pleasure.count') do
      post pleasures_url, params: { pleasure: { description: @pleasure.description, name: @pleasure.name, subcategory_id: @pleasure.subcategory_id, user_id: @pleasure.user_id } }, as: :json
    end

    assert_response 201
  end

  test "should show pleasure" do
    get pleasure_url(@pleasure), as: :json
    assert_response :success
  end

  test "should update pleasure" do
    patch pleasure_url(@pleasure), params: { pleasure: { description: @pleasure.description, name: @pleasure.name, subcategory_id: @pleasure.subcategory_id, user_id: @pleasure.user_id } }, as: :json
    assert_response 200
  end

  test "should destroy pleasure" do
    assert_difference('Pleasure.count', -1) do
      delete pleasure_url(@pleasure), as: :json
    end

    assert_response 204
  end
end
