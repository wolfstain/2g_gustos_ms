class PleasureSerializer < ActiveModel::Serializer
  attributes :id, :name, :description, :subcategory_id, :user_id, :created_at, :updated_at
  belongs_to :subcategory
end
